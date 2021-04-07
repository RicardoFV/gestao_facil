<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    // campos que serao usados para cadastro
    protected $fillable = [
        'nome',
        // 'caminho_imagem',
        //'nome_imagem',
        'descricao',
        'id_usuario',
        'id_versao',
        'excluido'
    ];
}
