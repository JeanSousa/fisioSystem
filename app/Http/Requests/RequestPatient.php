<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class RequestPatient extends FormRequest
{
    use SanitizesInput;

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
            'name' => 'required',
            'cpf' => 'required|cpf',
            'birth_date' => 'required'
        ];
    }

    /**
     * Sanitizers filters
     */
    public function filters()
    {
        return [
            'name' => 'trim'
        ];
    }

    public function messages()
    {
        return [
            'required' => '* O campo :attribute é obrigatório'
        ];
    }
}
