<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioFormRequest extends FormRequest
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
            'name' => ['required', 'string','min:10', 'max:255'],
            'email' => [
            'required',Rule::unique('users')->ignore('id'),'max:255'],
            'password' => ['required', 'string', 'min:8','max:16', 'confirmed'],
        ];
    }

    public function messages() {
        return [
             // mensagens em português
            'name.required'=> 'O campo nome é obrigatório',
            'name.min'=> 'O campo :attribute não permite menos de 10 caracteres',
            'nome.max' => 'O campo :attribute não permite mais de 255 caracteres',
            'email.required'=> 'O campo :attribute é obrigatório',
            'email.unique' => 'O campo :attribute não pode ser repetido',
            'email.max' => 'O campo :attribute não permite mais de 255 caracteres',
            'password.required'=> 'O campo :attribute é obrigatório',
            'password.min'=> 'A senha tem que ser pelo menos 8 digitos',
            'password.max' => 'O campo :attribute não permite mais de 16 caracteres',
            'password.confirmed'=> 'As senhas digitadas nao conferem',
        ];
    }
}
