<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamento extends Model
{
    protected $filable =[
        'nome',
        'dt_entrega',   
        'situacao',
        'id_usuario_responsavel',  
        'id_usuario',
        'id_requisito',
        'id_sistema'
    ];
}
