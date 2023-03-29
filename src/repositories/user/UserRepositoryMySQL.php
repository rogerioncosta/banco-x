<?php

namespace BancoX\repositories\user;

// Criando métodos para se comunicar com DB ou ORM.

// Criar registro no DB
class UserRepositoryMySQL implements IUserRepository {
    public function createUser(string $name, string $email, string $password, string $cpf): bool
    {
        return true;
    }

    public function getUserByCpf(string|int $cpf): mixed
    {
        
    }

    public function getAllUsers(): mixed
    {
        
    }
}

