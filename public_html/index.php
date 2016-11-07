<?php

    //Turning on/off error checking
    ini_set('display_errors',1);
    error_reporting(E_ALL);

    //Linking router.php
    define('ROOT', dirname(__FILE__));
    require_once(ROOT. '/components/Router.php');
    require_once(ROOT. '/components/Db.php');

    $router = new Router;
    $router->run();

?>
