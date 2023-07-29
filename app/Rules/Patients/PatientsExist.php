<?php

namespace App\Rules\Patients;

use App\Models\Patients;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PatientsExist implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $patient = Patients::find($value);
        if(empty($patient)) $fail('Patient does not exist in the system.');
    }
}
