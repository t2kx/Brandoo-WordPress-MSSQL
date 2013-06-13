                                                                                                               
 :::::::,.``                                                                                                   
 ::::::::::::::::,,.                                                                                           
 :::::::::::::::::::                                                                                           
 :::::::::::::::::::                                                                                           
 :::::.  :::::::::::`                                                      ++.                                 
 :::::.  :::::::::::,                                                      ##.                                 
 ,::::.  ::::::::::::                                                      ##.                                 
 .::::.  ::::::::::::                                                      ##.                                 
 `::::.  :,`   `,::::       +####.   ######`    '########.          '###'  ##.      `####.           +###;     
 `::::.  `       `:::     ,######`   +######:   '##########       '#######'##.     ########`       +#######;   
  ::::.            ::`    #######.   ########   '###########     ############.    ##########`     ##########'  
  ::::.    ,:::,   .:.   +##:             ,##,  '##      ###    :###`   .####.   ###+    +###    '###    ,###` 
  ::::.   :::::::   :,   ###               ##;  '##       ##,   ###       ###.  ,###      '##'   ###      `### 
  ::::.  `:::::::   ::   ##+               ##;  '##       ##;   ##;       '##.  ###        ###  .##:       ### 
  ,:::.  :::::::::  .:   ##+      :##########;  '##       ##;  ;##        `##.  ###        +##  ;##        `##`
  ,:::.  :::::::::  .:   ##+     :###########;  '##       ##;  ;##         ##.  ###        +##  ;##        `##.
  .:::,  .:::::::`  ::   ##+     ###;,,,,,,##;  '##       ##;  .##,       ;##`  ###        ###  ,##.       '## 
  `::::   :::::::   ::`  ##+     ##'       ##;  '##       ##;   ###       ###   ;##;      ,##+   ###       ### 
   ::::`   :::::   `::,  ##+     ##'      `##:  '##       ##;   +###     ###'    ###:    ,###    +##+     ###: 
   :::::           ::::  ##+     ############`  '##       ##;    ###########     .##########:     ###########  
   ::::::         :::::  ##+     ,##########+   '##       ##;     #########       ,########;       #########   
   :::::::.     .::::::  ##+      .########;    '##       ##;      ,#####.          '####+          :#####.    
   ::::::::::::::::::::                                                                                        
   ::::::::::::::::::::`                                                                                       
   ,::::::::::::::::::.                                                                                        
   `:::::::::::::::`                                                                                           
    :::::::::::,                                                                                               
    ::::::::`                                                                                                  
    ::::,                                                                                                      
    :.                                                                                                         
                                                                                                               
                                                                                                               
                                                                                                               
We are the humans behind Brandoo WordPress for MSSQL and MS Azure SQL

/* TEAM */
Name: Paweł Czyżewski
Title: Main Developer
e-mail: pawel.czyzewski@brandoo.pl

Name: Michał Smereczyński
Title: Project Lead
Twitter: smereczynski
e-mail: michal.smereczynski@brandoo.pl

/* THANKS */
OmniTI team (http://omniti.com/), T4ngram

/* DESCRIPTION */
Brandoo WordPress (MS SQL / Azure SQL) is a bundle of stable branch of WordPress and
a Database Abstraction plugin created by OmniTI team to make it possible to run WP
on top of MS SQL Server or Azure and provides two features, database access abstraction and SQL
dialect abstraction.

Database Access Abstraction is the way you connect to the database through PHP.

SQL dialect abstraction means translating from the dialect understood by Mysql
to other dialects.  Currently only translation layers for T-SQL (used by Azure and SQL Server)
are provided.

There is only one change in original WordPress file: /wp-admin/install.php. Changes in this file was
necessary because of specific installation mechanism in Web PI , Web Matrix and Azure Public/Private cloud.

Files necessary for the proper functioning of IIS (Web PI , Web Matrix and Azure Public/Private cloud) installator
are placed in GitHub repositorry: https://github.com/Brandoo/Brandoo-WordPress-WWAG-installator

Bundle was created with Windows Web Application Gallery in mind.

/* META */
Updated: 2013/06/13
See: http://brandoo.pl


