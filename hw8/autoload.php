<?php

spl_autoload_register('newAutoloader');

function newAutoloader($className) {
    $dirs = [
        'controller',
        'model'
    ];
    $found = false;
    foreach ($dirs as $dir) {
        $filename = __DIR__ .'/'.$dir.'/'.$className.'.php';
        if (is_file($filename))
        {
            require_once ($filename);
            $found=true;
        }
    }
    if (!$found) {
        throw new Exception('Class did not loaded ' . $className);
    }
    return true;
}




