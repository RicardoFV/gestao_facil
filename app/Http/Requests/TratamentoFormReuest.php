<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TratamentoFormReuest extends FormRequest
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
            'descricao' => ['required', 'string','min:10', 'max:400'],
            'dt_entrega' => ['required']
        ];
    }

    public function messages() {
        return [
             // mensagens em português
             'descricao.required' => 'O campo :attribute é obrigatório',
             'descricao.min' => 'O campo :attribute não permite menos de 10 caracteres',
             'descricao.max' => 'O campo :attribute não permite mais de 400 caracteres',
             'dt_entrega.required' => 'O campo data De entrega é obrigatório',
        ];
    }
}
