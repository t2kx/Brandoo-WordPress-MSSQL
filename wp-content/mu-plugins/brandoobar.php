<?php
/**
* @package BrandooBar
* @version 1.0
*/
/*
Plugin Name: Brandoo Bar
Plugin URI: http://wordpress.brandoo.pl
Description: Advertisement plugin for Brandoo WordPress commercial products.
Author: Michał Smereczyński
Version: 1.0
Author URI: http://brandoo.pl/en
*/

/* Copyright 2013 Grupa Brandoo (email: info@brandoo.pl)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

/**
* Add a widget to the dashboard.
*
* This function is hooked into the 'wp_dashboard_setup' action below.
*/

add_action('admin_bar_menu', 'add_toolbar_items', 100);
function add_toolbar_items($admin_bar){
        $admin_bar->add_menu( array(
                'id'    => 'commercial-support',
                'title' => 'Commercial Support',
                'href'  => '#',        
                'meta'  => array(
                        'title' => __('Commercial Supoort'),                        
                ),
        ));
        $admin_bar->add_menu( array(
                'id'    => 'support',
                'parent' => 'commercial-support',
                'title' => 'Support',
                'href'  => 'http://wordpress.brandoo.pl/products/#commercial-support',
                'meta'  => array(
                        'title' => __('Support'),
                        'target' => '_blank',
                        'class' => 'my_menu_item_class'
                ),
        ));
        $admin_bar->add_menu( array(
                'id'    => 'search-marketing',
                'parent' => 'commercial-support',
                'title' => 'Search Marketing',
                'href'  => 'http://wordpress.brandoo.pl/products/#search-marketing',
                'meta'  => array(
                        'title' => __('Search Marketing'),
                        'target' => '_blank',
                        'class' => 'my_menu_item_class'
                ),
        ));
        $admin_bar->add_menu( array(
                'id'    => 'cloud-website',
                'parent' => 'commercial-support',
                'title' => 'Cloud Website',
                'href'  => 'http://wordpress.brandoo.pl/products/#cloud-website',
                'meta'  => array(
                        'title' => __('Cloud Website'),
                        'target' => '_blank',
                        'class' => 'my_menu_item_class'
                ),
        ));
        $admin_bar->add_menu( array(
                'id'    => 'contact',
                'parent' => 'commercial-support',
                'title' => 'Contact',
                'href'  => 'http://wordpress.brandoo.pl/contact/',
                'meta'  => array(
                        'title' => __('Contact'),
                        'target' => '_blank',
                        'class' => 'my_menu_item_class'
                ),
        ));
} ?>
