<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaFormulario extends FormRequest
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
            'name' => 'required|min:10|max:255',
            'email' => 'required|min:10|max:255',
            'telefone_1' => 'required|min:8|max:13',
            'telefone_2' => 'required|min:8|max:14',
            'cnpj' =>'required|min:14|max:18|cnpj',
            'cep' =>'required|min:8|max:9|cep',
            'logradouro' =>'required',
            'complemento' =>  'required',
            'bairro' =>['required'],
            'localidade' =>['required'],
            'uf' =>['required'],
        ];
    }

    public function messages()
    {
        return [
            // mensagens em português
            'name.required' => 'O campo :attribute é obrigatório',
            'name.min' => 'O campo nome não permite menos de 10 caracteres',
            'name.max' => 'O campo nome não permite mais de 255 caracteres',
            'email.required' => 'O campo :attribute é obrigatório',
            'email.min' => 'O campo :attribute não permite menos de 10 caracteres',
            'email.max' => 'O campo :attribute não permite mais de 255 caracteres',
            'telefone_1.required' => 'O campo telefone 1 é obrigatório',
            'telefone_1.min' => 'O campo telefone 1 não permite menos de 12 caracteres',
            'telefone_1.max' => 'O campo telefone 1 não permite mais de 13 caracteres',
            'telefone_2.required' => 'O campo telefone 2 é obrigatório',
            'telefone_2.min' => 'O campo telefone 2 não permite menos de 12 caracteres',
            'telefone_2.max' => 'O campo telefone 2 não permite mais de 14 caracteres',
            'cnpj.min' => 'O campo :attribute não permite menos de 14 caracteres',
            'cnpj.max' => 'O campo :attribute não permite mais de 14 caracteres',
            'cnpj' => 'É necessário digitar um :attribute valido',
            'cep.required' => 'O campo :attribute é obrigatório',
            'cep' => 'É necessário digitar um :attribute valido',
            'cep.min' => 'O campo :attribute não permite menos de 8 caracteres',
            'cep.max' => 'O campo :attribute não permite mais de 9 caracteres',
            'logradouro.required' => 'O campo :attribute é obrigatório',
            'complemento.required' => 'O campo :attribute é obrigatório',
            'bairro.required' => 'O campo :attribute é obrigatório',
            'localidade.required' => 'O campo :attribute é obrigatório',
            'uf.required' => 'O campo :attribute é obrigatório',

        ];
    }
}
