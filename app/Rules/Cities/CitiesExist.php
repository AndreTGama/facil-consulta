<?php

namespace App\Rules\Cities;

use App\Models\Cities;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CitiesExist implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $city = Cities::find($value);
        if(empty($city)) $fail('city does not exist in the system.');
    }
}
