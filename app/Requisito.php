<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    // campos que serao usados para cadastro
    protected $fillable = [
        'nome',
        'descricao',
        'tipo_requisito',
        'id_usuario',
        'id_empresa',
        'excluido'
    ];
}
