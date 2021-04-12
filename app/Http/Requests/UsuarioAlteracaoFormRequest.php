<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UsuarioAlteracaoFormRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:10', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            // mensagens em português
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'O campo :attribute não permite menos de 10 caracteres',
            'nome.max' => 'O campo :attribute não permite mais de 255 caracteres',
        ];
    }
}
