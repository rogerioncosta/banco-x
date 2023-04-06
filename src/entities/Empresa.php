<?php

declare(strict_types=1); // A tipagem deve ser respeitada

namespace BancoX\entities;

use BancoX\entities\validators\CnpjValidator;
use BancoX\entities\validators\EmailValidator;
use BancoX\entities\validators\PasswordValidator;
use Error;

// Enumerations: para variáveis que recebem ativo ou inativo, ou sim ou não.
enum Status {
    case Active;
    case Inactive;
}

/* Exemplo:
enum Cores: string {
    case black = '#000';
    case white = '#f1f1';
    case red = 'cb1516';
}

Cores::red;
*/

class Empresa {
    private string $corporateName;
    private string $email;
    private string $password;
    private string $cnpj;
    private Status $status;

    private function __construct(string $corporateName, string $email, string $password, string $cnpj, Status $status) {
        $this->corporateName = $corporateName;
        $this->email = $email;
        $this->password = $password;
        $this->cnpj = $cnpj;
        $this->status = $status;
    }

    public static function create(string $corporateName, string $email, string $password, string $cnpj, Status $status) {

        // Validar os valores

        if(!PasswordValidator::valid($password)) {
            throw new Error('A senha não é válida');
        }

        if(!CnpjValidator::valid($cnpj)) {
            throw new Error('CPF não é válido');
        }

        if(!EmailValidator::valid($email)) {
            throw new Error("Email não é válido");
        }

        return new self($corporateName, $email, $password, $cnpj, $status);
    }

    public function getCorporateName() : string {
        return $this->corporateName;
    }

    public function getEmail() : string {
        return $this->email;
    }

    public function getPassword() : string {
        return $this->password;
    }

    public function getCnpj() : string {
        return $this->cnpj;
    }

    public function getStatus() : Status {
        return $this->status;
    }
     
}