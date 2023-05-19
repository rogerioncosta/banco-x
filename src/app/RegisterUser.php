<?php

declare(strict_types=1); // A tipagem deve ser respeitada

namespace BancoX\app;

use BancoX\entities\User;
use BancoX\repositories\user\IUserRepository;
use Error;
use PDOException;

// Vai unir as entidades, solicitações do usuário com os repositórios. Vai chamar os repositórios.
class RegisterUser {
    public IUserRepository $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $name, string $email, string $password, string $cpf): mixed {
        
        try {            
            $user = User::create($name, $email, $password, $cpf);

            return $this->repository->createUser(
                $user->getName(),
                $user->getEmail(),
                $user->getPassword(),
                $user->getCpf()
            );

        } catch (Error $error) {
            echo $error->getMessage();
            
        } catch(PDOException $error) {
            echo $error->getMessage();
        }
    }
}

// Testa na pasta Testes
