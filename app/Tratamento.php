<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamento extends Model
{
    // campos que serao usados para cadastro
    protected $fillable = [
        'dt_entrega',
        'situacao',
        'id_usuario_responsavel',
        'id_usuario',
        'id_requisito',
        'id_sistema',
        'id_empresa',
        'excluido'
    ];
    //formatar data
    public static function formatarData($data)
    {
        return date("d-m-Y", strtotime($data));
    }
}
