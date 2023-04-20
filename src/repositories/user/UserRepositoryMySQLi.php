<?php

namespace BancoX\repositories\user;

use PDO;
use PDOException;

// Criando métodos para se comunicar com DB ou ORM.

// Criar registro no DB
class UserRepositoryMySQLi implements IUserRepository {

    public $host = "localhost";
    public $dbname = "bancox";
    public $user = "root";
    private $pass = "";
    public $conn;

    public function connectionMSQLi() {        
    
        try {
            $this->conn = new PDO("msql:host=$this->host;dbname", $this->user, $this->pass);
    
            // Ativar o modo de erros
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $err) {
            // Erro na conexão
            $error = $err->getMessage();
            echo "Erro: $error";
        }
    }

    public function createUser(string $name, string $email, string $password, string $cpf): bool {

        $query = "INSERT INTO user (name, email, password, cpf) VALUES (:name, :email, :password, :cpf)";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":cpf", $cpf);  
        
        if(!$query) {
            return false;
        }

        return true;
    }

    public function getUserByCpf(string|int $cpf): array | false
    {
        return true;
    }

    public function getAllUsers(): bool
    {
        return true;
    }
}

