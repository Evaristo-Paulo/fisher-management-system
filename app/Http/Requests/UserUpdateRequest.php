<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'email' => "required|email",
            'role' => 'required',
            'gender' => 'required',
            'photo' => 'mimes:png,jpg,jpeg'
        ];
    }
    public function messages()
    {
        return [
            'photo.mimes' => 'Carrega uma foto válida (.png, .jpg, .jpeg) ',
            'name.required' => 'Campo nome completo é de preenchimento obrigatório ',
            'email.required' => 'Campo email é de preenchimento obrigatório ',
            'email.email' => 'Campo email deve receber um email válido ',
            'gender.required' => 'Campo gênero é de preenchimento obrigatório ',
            'role.required' => 'Campo role é de preenchimento obrigatório ',
            'email.unique' => 'Já existe usuário com este email ',
            'name.min' => 'Campo nome deve ter mais de 2 caracteres ',
        ];
    }
}
