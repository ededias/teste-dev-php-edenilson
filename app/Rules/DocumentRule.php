<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DocumentRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
      
        if (strlen(static::clearString($value)) < 11)
            $fail('Por favor, forneça um documento valído.');
            
        $isValidCpf = static::cpf($attribute, $value);
        if (!$isValidCpf && (strlen(static::clearString($value)) == 11))
            $fail('Por favor, forneça um documento valído.');
                
        if (strlen(static::clearString($value)) > 11 && strlen(static::clearString($value)) < 14)
            $fail('Por favor, forneça um CNPJ valído.');
                    
        $isValidCnpj = static::cnpj($attribute, $value);
        
        if (!$isValidCnpj && (strlen(static::clearString($value)) >= 14))
            $fail('Por favor, forneça um CNPJ valído.');

    }

    private static function clearString($value) 
    {
        return preg_replace('/[^0-9]/', '', (string) $value);
    }

    private static function cnpj($attribute, $cnpj)
    {

        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        
        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;
        
        // Verifica se todos os digitos são iguais
        if (preg_match('/(\d)\1{13}/', $cnpj))
            return false;
        
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
            return false;
        
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }

    private static function equalsCpf()
    {
        return [
            '11111111111',
            '22222222222',
            '33333333333',
            '44444444444',
            '55555555555',
            '66666666666',
            '77777777777',
            '88888888888',
            '99999999999'
        ];
    }
    private static function cpf($attribute, $cpf)
    {

        if (empty($cpf))
            return false;

        // Elimina possível máscara
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        if (preg_match('/(\d)\1{10}/', $cpf)) 
            return false;
        

        for ($t = 9; $t < 11; $t++) {

            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;

    }

}