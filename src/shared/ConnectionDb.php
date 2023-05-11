<?php

namespace BancoX\shared;

use PDO;
use PDOException;

class ConnectionDb {
    private readonly string $host;
    private readonly string $dbname;
    private readonly string $user;
    private readonly string $password;
    private readonly PDO $connection;

    private function __construct(string $host, string $dbname, string $user, string $password) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->password = $password;
    }

    public static function get(): PDO {       
        try {
            define("HOST", "localhost");
            define("DBNAME", "banco-x");
            define("USER", "root");
            define("PASS", "");

            $db = new self(HOST, DBNAME, USER, PASS);

            $db->connection = new PDO("mysql:host=$db->host;dbname=".$db->dbname, $db->user, $db->password);
            $db->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db->connection;

        } catch(PDOException $err) {
            // Erro na conexão
            $error = $err->getMessage();
            echo "Erro: $error";
        }
    }
}