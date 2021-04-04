<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidaSenhaFormRequest extends FormRequest
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
            'password' => ['required', 'string', 'min:8', 'max:16', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'O campo :attribute é obrigatório',
            'password.min' => 'A senha tem que ser pelo menos 8 digitos',
            'password.max' => 'O campo :attribute não permite mais de 16 caracteres',
            'password.confirmed' => 'As senhas digitadas nao conferem',
        ];
    }
}
