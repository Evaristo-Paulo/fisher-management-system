<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FisherChangePhotoRequest extends FormRequest
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
            'bi' => "required",
            'photo' => 'required|mimes:png,jpg,jpeg'
        ];
    }
    public function messages()
    {
        return [
            'photo.required' => 'Campo fotografia é de preenchimento obrigatório ',
            'bi.required' => 'Campo bi/nif é de preenchimento obrigatório ',
            'photo.mimes' => 'Carrega uma foto válida (.png, .jpg, .jpeg) ',
        ];
    }
}
