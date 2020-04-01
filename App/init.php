<?php

/**
 * 
 * call config
 */
require_once 'config/config.php';

/**
 * 
 * 
 * session start
 */
if(!session_id()) session_start();
ob_start();

/**
 * 
 * 
 * load all class
 */
spl_autoload_register(function ($class_name) {
    $class_name = explode('\\', $class_name);

    // Nama folder class
    $i = count($class_name)-2;
    if ( $i > 0){
        $sub = $class_name[$i];

    }elseif ($i < 0){
        $sub = "core";
    }
    
    // Nama class
    $class_name = end($class_name);
    require_once __DIR__.'\\'.$sub.'\\'.$class_name .'.php';
});
