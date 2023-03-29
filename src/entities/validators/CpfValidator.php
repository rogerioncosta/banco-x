<?php

namespace BancoX\entities\validators;

class CpfValidator
{
    public static function valid(string $cpf): bool
    {
        $pattern = '/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/';

        if($cpf === '000.000.000-00') {
            return false;
        }

        if (!preg_match($pattern, $cpf)) {
            return false;            
        }

        return true;
    }
}

var_dump(CpfValidator::valid('000.000.000-00'));
