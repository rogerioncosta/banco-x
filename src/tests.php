<?php

require_once __DIR__ . "/../vendor/autoload.php";

use BancoX\repositories\user\UserRepositoryInMemory;
use BancoX\app\RegisterUser;
use BancoX\app\GetAllUsers;

// Teste:

// Cria usuário (cadastro)
$inMemoryRepository = new UserRepositoryInMemory();

$registerSaveInMemory = new RegisterUser($inMemoryRepository);

$registerSaveInMemory->execute('Rogerio', 'rogerio@gmail.com', 'Senha@12345678', '123.554.988-25');

// Obter todos os usuários
$getAllUsersInMemory = new GetAllUsers($inMemoryRepository);

print_r($getAllUsersInMemory->execute());
