<?php

//namespace tests;

use BancoX\app\Login;
use BancoX\app\RegisterUser;
use BancoX\repositories\user\UserRepositoryInMemory;

require_once __DIR__ . "/../../vendor/autoload.php";

$repository = new UserRepositoryInMemory();

/**
 * Cadastrar usuário
 */

$registerInMemory = new RegisterUser($repository);

$registerInMemory->execute('Rogerio', 'rogerio@gmail.com', 'Senha@12345678', '123.554.988-25');

/**
 * Testa login
 */

$login = new Login($repository);

$isUserValid = $login->checkCredentials('123.554.988-25', 'Senha@12345678');

var_dump($isUserValid);