<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //passando os atributos
    protected $fillable = [
        'name',
        'email',
        'telefone_1',
        'telefone_2',
        'cnpj',
        'situacao_empresa',
        'id_endereco',
        'id_usuario'
    ];
}
