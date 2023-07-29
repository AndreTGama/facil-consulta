<?php

namespace App\Rules\Doctors;

use App\Models\Doctors;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DoctorsExist implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $doctor = Doctors::find($value);
        if(empty($doctor)) $fail('Doctor does not exist in the system.');
    }
}
