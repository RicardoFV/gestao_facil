<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    protected $fillable = [
        'nome',
        'imagem',
       // 'caminho_imagem',
        //'nome_imagem',
        'descricao',
        'id_usuario',
        'id_versao'
    ];
    public static function listar(){
        return self::all();
    }

}
