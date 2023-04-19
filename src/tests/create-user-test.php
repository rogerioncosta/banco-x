<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use BancoX\repositories\user\UserRepositoryInMemory;
use BancoX\app\RegisterUser;

// Teste:

// Cria usuário (cadastro)
$inMemoryRepository = new UserRepositoryInMemory();

$registerInMemory = new RegisterUser($inMemoryRepository);

$registerInMemory->execute('Rogerio', 'rogerio@gmail.com', 'Senha@12345678', '123.554.988-25');
$registerInMemory->execute('teste', 'teste@gmail.com', 'Senha@12345678', '123.554.482-00');

var_dump($registerInMemory);