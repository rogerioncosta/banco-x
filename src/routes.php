<?php

$uri = $_SERVER['REQUEST_URI'];

switch ($uri) {
    case '/':
        require_once __DIR__ . "/pages/home.php";
        break;

    case '/conta':
        require_once __DIR__ . "/pages/conta.php";
        break;
    
    default:
        require_once __DIR__ . "/pages/404.php";
        break;
}