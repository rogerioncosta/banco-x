<?php

use BancoX\app\RegisterUser;
use BancoX\repositories\user\UserRepositoryMySQLi;

require_once __DIR__ . "/../../vendor/autoload.php";

$MSQLiRepository =  new UserRepositoryMySQLi();

$registerMSQLi = new RegisterUser($MSQLiRepository);

$registerMSQLi->execute('RogerioM', 'rogerio@gmail.m', 'Senha@1234567m', '545.655.988-55');

var_dump($registerMSQLi);