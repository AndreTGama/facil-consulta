<?php

namespace App\Http\Requests\Doctors;

use App\Builder\ReturnMessage;
use App\Rules\Doctors\DoctorsExist;
use App\Rules\Patients\PatientsExist;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LinkPatientWithDoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(auth()->user()) return true;
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'medico_id' => ['required', 'integer', new DoctorsExist],
            'paciente_id' => ['required', 'integer', new PatientsExist]
        ];
    }
    /**
     *
     * @return HttpResponseException
     */
    public function failedValidation(Validator $validator)
    {
        $errors = [];
        $messages = $validator->errors()->messages();

        foreach($messages as $m){
            array_push($errors, $m[0]);
        }

        throw new HttpResponseException(
            ReturnMessage::message(
                true,
                'Something went wrong',
                'Erro in request',
                null,
                $errors,
                400
            )
        );
    }
}
