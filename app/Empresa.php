<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use SoftDeletes;
    //passando os atributos
    protected $fillable = [
        'name',
        'email',
        'telefone_1',
        'telefone_2',
        'cnpj',
        'situacao_empresa',
        'cep',
        'logradouro',
        'complemento',
        'bairro',
        'localidade',
        'uf',
        'id_usuario'
    ];
}
