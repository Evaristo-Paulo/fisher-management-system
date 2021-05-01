<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'name' => 'required|min:3',
            //'email' => "required|unique:users,email,{$this->user->id}",
            'email' => "required|email|unique:users,email",
            'password' => 'required|min:6',
            'role' => 'required',
            'gender' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Campo nome completo é de preenchimento obrigatório ',
            'email.email' => 'Campo email deve receber um email válido ',
            'email.required' => 'Campo email é de preenchimento obrigatório ',
            'password.required' => 'Campo senha é de preenchimento obrigatório ',
            'gender.required' => 'Campo gênero é de preenchimento obrigatório ',
            'role.required' => 'Campo role é de preenchimento obrigatório ',
            'email.unique' => 'Já existe usuário com este email ',
            'name.min' => 'Campo nome deve ter mais de 2 caracteres ',
            'password.min' => 'Campo senha deve ter mais de 5 caracteres ',
        ];
    }

}
