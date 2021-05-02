<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PesquisaFormRequest extends FormRequest
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
            'pesquisa' => ['required', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            // mensagens em português
            'pesquisa.required' => 'O campo :attribute é obrigatório',
            'pesquisa.max' => 'O campo :attribute não permite mais de 255 caracteres',
        ];
    }
}
