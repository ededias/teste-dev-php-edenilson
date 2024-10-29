<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        if (static::phoneValidator($attribute, $value)) $fail('Por favor, forneça um telefone valído.');
        
    }

    private static function phoneValidator($attribute, $phone, $forceOnlyNumber = true)
    {
       
        $phoneString = preg_replace('/[()]/', '', $phone);
        
        if (preg_match('/^(?:(?:\+|00)?(55)\s?)?(?:\(?([0-0]?[0-9]{1}[0-9]{1})\)?\s?)??(?:((?:9\d|[2-9])\d{3}\-?\d{4}))$/', $phoneString, $matches)) {
            return false;
        }
        return true;
    } 
}
