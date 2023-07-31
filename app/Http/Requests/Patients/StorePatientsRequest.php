<?php

namespace App\Http\Requests\Patients;

use App\Builder\ReturnMessage;
use App\Rules\Patients\CpfExist;
use App\Rules\Patients\VerifyCharactersCelphone;
use App\Rules\Patients\VerifyCharactersCpf;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePatientsRequest extends FormRequest
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
            'nome' => 'required|max:100',
            'cpf' => ['required','max:20', new CpfExist, new VerifyCharactersCpf],
            'celular' => ['required','max:20', new VerifyCharactersCelphone],
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
