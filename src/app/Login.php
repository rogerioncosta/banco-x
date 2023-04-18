<?php

namespace BancoX\app;

use BancoX\repositories\user\IUserRepository;

class Login {
    public IUserRepository $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function checkCredentials(string $cpf, string $password) {
        /**
         * Acessar repositório para chegar se:
         * 
         * * cpf exite
         * * senha está correta
         * 
         */

         /**
          * TODO: Validar o CPF
          */
        
        $user = $this->repository->getUserByCpf($cpf);

        if(!$user) {
            return false;
        }

        if($user["password"] !== $password) {
            return false;
        }

        $_SESSION["user_logged"] = [
            "name" => $user["name"],
            "email" => $user["email"]
        ];

        return $user;
    }

    public static function isLogged() : bool {
        if($_SESSION["user_logged"]) {
            return true;
        }

        return false;
    }

    public static function signOut() {
        unset($_SESSION["user_logged"]);
        header("Location: /login");
    }
}