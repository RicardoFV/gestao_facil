<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Versao extends Model
{
    protected $table = 'versaos';
    protected $fillable = [
        'nome',
        'id_usuario'
    ];

    public static function listar(){
        return self::all();
    }

    public static function inserir(array $dados){
        self::create($dados);
    }
}
