<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SistemaFormRequest extends FormRequest
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
            'nome' =>['required','min:10' ,'max:255'],
            'descricao' => ['required', 'string','min:10', 'max:400'],
        ];
    }

    public function messages() {
        return [
             // mensagens em português
             'nome.required' => 'O campo :attribute é obrigatório',
             'nome.min' => 'O campo :attribute não permite menos de 10 caracteres',
             'nome.max' => 'O campo :attribute não permite mais de 255 caracteres',
             'descricao.required' => 'O campo :attribute é obrigatório',
             'descricao.min' => 'O campo :attribute não permite menos de 10 caracteres',
             'descricao.max' => 'O campo :attribute não permite mais de 400 caracteres',
        ];
    }
}
