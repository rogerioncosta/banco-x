<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use BancoX\app\GetAllUsers;

// Obter todos os usuários
$getAllUsersInMemory = new GetAllUsers($inMemoryRepository);

print_r($getAllUsersInMemory->execute());