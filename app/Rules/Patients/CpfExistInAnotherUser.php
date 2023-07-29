<?php

namespace App\Rules\Patients;

use App\Models\Patients;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Route;

class CpfExistInAnotherUser implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        dd(Route::input('id_patient'));
        $cpf = preg_replace('/\D/', '', $value);
        $patient = Patients::where('cpf', $cpf)->first();
        if(!empty($patient)) $fail('CPF in use.');
    }
}
