<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => "required|email",
            'password' => 'required|min:6',
            'password-same' => 'required|min:6|same:password',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Campo email é de preenchimento obrigatório ',
            'email.email' => 'Campo email deve receber um email válido ',
            'password.required' => 'Campo senha é de preenchimento obrigatório ',
            'password-same.required' => 'Campo confirma senha é de preenchimento obrigatório ',
            'password.min' => 'Campo senha deve ter mais de 5 caracteres ',
            'password-same.min' => 'Campo confirma senha deve ter mais de 5 caracteres ',
            'password-same.same' => 'Campo confirma senha deve ser igual ao campo senha ',
        ];
    }
}
