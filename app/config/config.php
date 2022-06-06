<?php
    //Database params
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root'); 
    define('DB_PASS', ''); 
    define('DB_NAME', 'restful'); 

    //APPROOT
    define('__APPROOT__', dirname(dirname(__FILE__)));
    define('__DIR_ROOT__', $_SERVER['DOCUMENT_ROOT'] . '/restful');

    //URLROOT (Dynamic links)
    define('__URLROOT__', 'http://localhost/restful');

    //Sitename
    define('__SITENAME__', 'restful');
