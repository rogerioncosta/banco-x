<?php

namespace BancoX\controllers;

use BancoX\app\RegisterUser;
use BancoX\repositories\user\UserRepositoryMySQLi;

class RegisterController {
    public static function index(array $payload) {
        $repository = new UserRepositoryMySQLi();

        $registerUser = new RegisterUser($repository);

        $registered = $registerUser->execute($payload["name"], $payload["email"], $payload["password"], $payload["cpf"]);

        if($registered) {
            echo "Usuário cadastrado com sucesso. ";
        }
    }
}