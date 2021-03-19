<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    // campos que serao usados para cadastros
    protected $fillable = [
        'nome',
        'descricao',
        'tipo_requisito',
        'id_usuario'
    ];

    public static function listar(){
        return self::all();
    }

}
