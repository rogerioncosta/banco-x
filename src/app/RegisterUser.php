<?php

declare(strict_types=1); // A tipagem deve ser respeitada

use BancoX\repositories\user\IUserRepository;

// Vai unir as entidades, solitações do usuário com os repositórios. Vai chamar os repositórios.
class RegisterUser {
    public IUserRepository $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $name, string $email, string $password, string $cpf): mixed {
        $this->repository->createUser($name, $email, $password, $cpf);
    }
}

$inMemoryRepository = new UserRepositoryInMemory();

$registerSaveInMemory = new RegisterUser($inMemoryRepository);

$registerSaveInMemory->execute('Rogerio', 'rogerio@gmail.com', '123456A*', '123.554.988-25');
