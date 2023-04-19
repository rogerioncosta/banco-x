<?php

namespace BancoX\app;

use BancoX\entities\validators\CpfValidator;
use Error;

class Account {
    private float $balance = 0;
    private array $accountTypes;
    private int $numberAccount;
    private int $agency;
    private int $bank = 000;

    public function __construct(int $numberAccount, int $agency, array $accountTypes)
    {
        /*
        $types = [
            "SAVINGS_ACCOUNT", 
            "CHECKING_ACCOUNT"
        ];

        $typeExists = array_search($accountTypes, $types, true);
        

        if(!$typeExists) {
            throw new Error("Tipo de conta não é válido");
        }
        */

        $this->numberAccount = $numberAccount;
        $this->agency = $agency;
        $this->accountTypes = $accountTypes;        
    }

    private array $extract = [];

    public function take(float $value): array {
        $previousBalance = $this->balance;

        if($value > $this->balance) {
            throw new Error("Saldo insuficiente, tente com um valor inferior a {$this->balance}.");
        }        

        $this->balance -= $value;        

        $transaction = [            
            "drawn" => $value,
            "previousBalance" => $previousBalance,
            "currentBalance" => $this->balance,
            "transactionType" => "output"
        ];

        $this->extract = [...$this->extract, $transaction];
        //array_push($this->extract, $transaction);

        return $transaction;
    }

    public function deposit(float $value): array {
        $previousBalance = $this->balance;
        
        $this->balance += $value;

        $transaction = [
            "previousBalance" => $previousBalance,
            "currentBalance" => $this->balance,
            "transactionType" => "input"
        ];

        $this->extract = [...$this->extract, $transaction];
        //array_push($this->extract, $transaction);

        return $transaction;
    }

    public function makePix(string $recipientCpf, float $value, string $description) {
        $this->balance -= $value;

        $transaction = [
            "currentBalance" => $this->balance,
            "description" => $description,
            "message" => "PIX enviado para $recipientCpf",
            "receiver" => [
                "cpf" => $recipientCpf,               
                "value" => $value
            ],
            "transactionType" => "output"
        ];

        $this->extract = [...$this->extract, $transaction];
        //array_push($this->extract, $transaction);
        
        return $transaction;
    }

    public function transfer(string $cpf, int $numberAccount, int $agency, int $bank, float $value) {
        if($bank != 000) {
            throw new Error("Somente é permitido transferência para banco x");
        }

        $isCpfValid = CpfValidator::valid($cpf);

        if(!$isCpfValid) {
            throw new Error("CPF não é válido");
        }

        $this->balance -= $value;

        $transaction = [
            "currentBalance" => $this->balance,
            "message" => "Transferência feita para $cpf",
            "receiver" => [
                "cpf" => $cpf,
                "numberAccount" => $numberAccount,
                "agency" => $agency,
                "bank" => $bank,
                "value" => $value
            ],
            "transactionType" => "output"
        ];

        $this->extract = [...$this->extract, $transaction];
        //array_push($this->extract, $transaction);

        return $transaction;
    }

    public function pay(string $cpf, string $barCode, float $value) {
        $isCpfValid = CpfValidator::valid($cpf);

        if(!$isCpfValid) {
            throw new Error("CPF não é válido");
        }

        $this->balance -= $value;

        $transaction = [
            "barCode" => $barCode,
            "currentBalance" => $this->balance,
            "message" => "Boleto pago para o recebedor com o cpf: $cpf",
            "receiver" => [
                "cpf" => $cpf,               
                "value" => $value
            ],
            "transactionType" => "output"
        ];

        $this->extract = [...$this->extract, $transaction];
        //array_push($this->extract, $transaction);

        return $transaction;

    }

    function showBalance() {
        return $this->balance;
    }

    function showExtract() {
        return $this->extract;
    }

}