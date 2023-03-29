<?php

namespace BancoX\repositories\user;

// Métodos obrigatórios
interface IUserRepository {
    // Comunicação com o DB (MySQL, MongoDB
    public function createUser(string $name, string $email, string $password, string $cpf): bool;

    // | union type, aceita string e int
    public function getUserByCpf(string | int $cpf): mixed;

    public function getAllUsers(): mixed;

}