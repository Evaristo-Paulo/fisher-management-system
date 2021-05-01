<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FisherUpdateRequest extends FormRequest
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
            'bi' => "required",
            'email' => "email",
            'birthday' => 'required',
            'phone' => 'required',
            'municipe' => 'required',
            'province' => 'required',
            'fisherType' => 'required',
            'photo' => 'mimes:png,jpg,jpeg'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Campo nome completo é de preenchimento obrigatório ',
            'email.email' => 'Campo email deve receber um email válido ',
            'bi.required' => 'Campo bi/nif é de preenchimento obrigatório ',
            'birthday.required' => 'Campo data de nascimento é de preenchimento obrigatório ',
            'phone.required' => 'Campo telefone é de preenchimento obrigatório ',
            'municipe.required' => 'Campo município é de preenchimento obrigatório ',
            'province.required' => 'Campo província é de preenchimento obrigatório ',
            'fisherType.required' => 'Campo tipo de armador é de preenchimento obrigatório ',
            'name.min' => 'Campo nome deve ter mais de 2 caracteres ',
            'photo.mimes' => 'Carrega uma foto válida (.png, .jpg, .jpeg) ',
        ];
    }
}
