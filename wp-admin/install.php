<?php
/**
 *   This file is part of Brandoo WordPress (MSSQL / AzureSQL).
 *
 *   Foobar is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   Foobar is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with Foobar; if not, write to the Free Software
 *   Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * 
 *   ---
 * 
 *   Original file \wp-content\mu-plugins\wp-db-abstraction\setup-config.php modified
 *   to create "Authentication Unique Keys and Salts" in wp-config.php 
 *   after "Web App Gallery" WordPress package installation.
 * 
 */

$configFlatFile = file_get_contents(dirname( dirname( __FILE__ ) ) . '/wp-config.php');

if(strpos($configFlatFile, 'put your unique phrase here') === false) {
    require_once('install-original.php');
} else {

    define('WP_INSTALLING', true);

    /**
     * We are blissfully unaware of anything.
     */
    define('WP_SETUP_CONFIG', true);

    /**
     * Disable error reporting
     *
     * Set this to error_reporting( E_ALL ) or error_reporting( E_ALL | E_STRICT ) for debugging
     */
    error_reporting(0);

    /**#@+
     * These three defines are required to allow us to use require_wp_db() to load
     * the database class while being wp-content/db.php aware.
     * @ignore
     */
    define('ABSPATH', dirname( dirname( __FILE__ ) ).'/');
    define('WPINC', 'wp-includes');
    define('WP_CONTENT_DIR', ABSPATH . 'wp-content');
    define('WP_DEBUG', false);
    /**#@-*/

    require_once(ABSPATH . WPINC . '/load.php');
    require_once(ABSPATH . WPINC . '/compat.php');
    require_once(ABSPATH . WPINC . '/functions.php');
    require_once(ABSPATH . WPINC . '/class-wp-error.php');
    require_once(ABSPATH . WPINC . '/version.php');

    $configFile = file(ABSPATH . 'wp-config.php');

    // Fetch or generate keys and salts.
    $no_api = isset( $_POST['noapi'] );
    require_once( ABSPATH . WPINC . '/plugin.php' );
    require_once( ABSPATH . WPINC . '/l10n.php' );
    require_once( ABSPATH . WPINC . '/pomo/translations.php' );
    if ( ! $no_api ) {
        require_once( ABSPATH . WPINC . '/class-http.php' );
        require_once( ABSPATH . WPINC . '/http.php' );
        wp_fix_server_vars();
        /**#@+
        * @ignore
        */
        function get_bloginfo() {
                return ( ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . str_replace( $_SERVER['PHP_SELF'], '/wp-admin/install.php', '' ) );
        }
       /**#@-*/
        $secret_keys = wp_remote_get( 'https://api.wordpress.org/secret-key/1.1/salt/' );
    }

    if ( $no_api || is_wp_error( $secret_keys ) ) {
        $secret_keys = array();
        require_once( ABSPATH . WPINC . '/pluggable.php' );
        for ( $i = 0; $i < 8; $i++ ) {
                $secret_keys[] = wp_generate_password( 64, true, true );
        }
    } else {
        $secret_keys = explode( "\n", wp_remote_retrieve_body( $secret_keys ) );
        foreach ( $secret_keys as $k => $v ) {
                $secret_keys[$k] = substr( $v, 28, 64 );
        }
    }
    $key = 0;

    foreach ($configFile as $line_num => $line) {
        switch (substr($line,0,16)) {
            default:
                break;
            case "define('AUTH_KEY":
            case "define('SECURE_A":
            case "define('LOGGED_I":
            case "define('NONCE_KE":
            case "define('AUTH_SAL":
            case "define('SECURE_A":
            case "define('LOGGED_I":
            case "define('NONCE_SA":
                    $configFile[$line_num] = str_replace('put your unique phrase here', $secret_keys[$key++], $line );
                    break;
        }
    }

    $handle = fopen(ABSPATH . 'wp-config.php', 'w');
    if($handle) {
        
        foreach( $configFile as $line ) {
                fwrite($handle, $line);
        }
        
        fclose($handle);
        chmod(ABSPATH . 'wp-config.php', 0666);

        header('Location: ' . ( ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . str_replace('wp-content/mu-plugins/wp-db-abstraction/setup-config.php', '', $_SERVER['PHP_SELF']) ));
        
    } else {
        echo 'Can`t write to "wp-config.php" file. Please edit it manually, than open this <a href="' . ( ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . str_replace('wp-content/mu-plugins/wp-db-abstraction/setup-config.php', '', $_SERVER['PHP_SELF']) ) . '">link</a>, to finish installation.' ;
        echo '<pre>' . implode(PHP_EOL, $configFile) . '</pre>';
    }

    die();
}