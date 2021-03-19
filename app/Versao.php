<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Versao extends Model
{
    protected $filable = [
        'nome',
        'id_usuario'
    ];

    public static function listar(){
        return self::all();
    }
}
