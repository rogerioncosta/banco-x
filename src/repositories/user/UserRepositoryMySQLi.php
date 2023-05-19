<?php

namespace BancoX\repositories\user;

use PDO;
use BancoX\shared\ConnectionDb;
use Error;

// Criando métodos para se comunicar com DB ou ORM.

// Criar registro no DB
class UserRepositoryMySQLi implements IUserRepository {
    public function createUser(string $name, string $email, string $password, string $cpf): bool
    {
      $db = ConnectionDb::get(); 
  
      $query = "INSERT INTO user (name, email, cpf, password) VALUES (:name, :email, :cpf, :password)";
      
      $statement = $db->prepare($query);
  
      $statement->bindValue(":name", $name);
      $statement->bindValue(":email", $email);
      $statement->bindValue(":cpf", $cpf);  
      $statement->bindValue(":password", $password);

      try {
        return $statement->execute();
        
      } catch(Error $e) {
        echo $e->getMessage();
      }
  
    } 
  
    public function getUserByCpf(string|int $cpf): mixed
    {
      $db = ConnectionDb::get();
  
      $query = "SELECT * FROM user WHERE cpf=:cpf";
  
      $statement = $db->prepare($query);
  
      $statement->bindValue(":cpf", (string)$cpf);
  
      $statement->execute();
  
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
  
    public function getAllUsers(): mixed
    {
      $db = ConnectionDb::get();
  
      $query = "SELECT id, name, email, cpf FROM user";
  
      $statement = $db->query($query);
  
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
  }
