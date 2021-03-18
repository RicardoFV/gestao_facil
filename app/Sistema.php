<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    protected $filable = [
        'nome',
        'imagem',
        'caminho_imagem',
        'nome_imagem',
        'descricao',
        'id_usuario',
        'id_versao'
    ];

}
