<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FreightCaptureByFishersFilterRequest extends FormRequest
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
            'year' => 'required',
            'month' => "required",
        ];
    }
    public function messages()
    {
        return [
            'year.required' => 'Campo ano completo é de preenchimento obrigatório ',
            'month.required' => 'Campo mês é de preenchimento obrigatório ',
        ];
    }
}
