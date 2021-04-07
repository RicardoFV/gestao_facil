<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamento extends Model
{
    // campos que serao usados para cadastro
    protected $fillable = [
        'descricao',
        'dt_entrega',
        'situacao',
        'id_usuario_responsavel',
        'id_usuario',
        'id_requisito',
        'id_sistema',
        'excluido'
    ];
  
}
