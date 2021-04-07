<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Versao extends Model
{   // nome da tabela 
    protected $table = 'versaos';
    // campos que serao usados para cadastro
    protected $fillable = [
        'nome',
        'id_usuario',
        'excluido'
    ];
}
