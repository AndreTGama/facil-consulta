<?php

namespace App\Http\Requests\Patients;

use App\Builder\ReturnMessage;
use App\Rules\Patients\CpfExistInAnotherUser;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePatientsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user() ? true : false;
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
            'celular' => 'required|max:20'
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
