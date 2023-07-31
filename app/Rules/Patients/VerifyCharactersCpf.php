<?php

namespace App\Rules\Patients;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class VerifyCharactersCpf implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $cpf = preg_replace('/\D/', '', $value);
        if(strlen($cpf) < 11 || strlen($cpf) >= 12 ) $fail('Characters numbers not accepted in CPF.');
    }
}
