<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FreightAddCaptureRequest extends FormRequest
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
            'fisher' => 'required',
            'weight' => "required",
            'date' => 'required',
            'resource' => 'required',
            'specie' => 'required',
            'state' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'fisher.required' => 'Campo armador completo é de preenchimento obrigatório ',
            'weight.required' => 'Campo peso de nascimento é de preenchimento obrigatório ',
            'date.required' => 'Campo data de captura é de preenchimento obrigatório ',
            'resource.required' => 'Campo recurso é de preenchimento obrigatório ',
            'specie.required' => 'Campo espécie é de preenchimento obrigatório ',
            'state.required' => 'Campo estado de conservação é de preenchimento obrigatório ',
        ];
    }
}
