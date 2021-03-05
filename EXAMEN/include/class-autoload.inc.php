<?php

spl_autoload_register('Chargement');

function Chargement ($className){
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URL'];

    if (strpos($url, 'include') !== false){
        $path = '../class/';
    }
    else{
        $path = 'class/';
    }

    $extension = '.class.php';
    require_once $path . $className . $extension;

    
}