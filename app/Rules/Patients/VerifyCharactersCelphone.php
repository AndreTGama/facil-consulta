<?php

namespace App\Rules\Patients;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class VerifyCharactersCelphone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $cel = preg_replace('/\D/', '', $value);
        if(strlen($cel) < 10 || strlen($cel) >= 12 ) $fail('Characters numbers not accepted.');
    }
}
