<?php

namespace BancoX\app;

use BancoX\repositories\user\IUserRepository;

class GetAllUsers {    
        public IUserRepository $repository;
    
        public function __construct(IUserRepository $repository)
        {
            $this->repository = $repository;
        }
    
        public function execute(): mixed {
            return $this->repository->getAllUsers();
        }
    }