<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnderecoFormulario extends FormRequest
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
            'cep' =>'required|min:8|max:9|unique:enderecos|cep',
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
            'cep.required' => 'O campo :attribute é obrigatório',
            'cep' => 'É necessário digitar um :attribute valido',
            'cep.min' => 'O campo :attribute não permite menos de 8 caracteres',
            'cep.max' => 'O campo :attribute não permite mais de 9 caracteres',
            'cep.unique' => 'Esse :attribute já se encontra em nossa base de dados',
            'logradouro.required' => 'O campo :attribute é obrigatório',
            'complemento.required' => 'O campo :attribute é obrigatório',
            'bairro.required' => 'O campo :attribute é obrigatório',
            'localidade.required' => 'O campo :attribute é obrigatório',
            'uf.required' => 'O campo :attribute é obrigatório',

        ];
    }
}
