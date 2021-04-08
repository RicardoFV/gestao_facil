<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descricoes extends Model
{
    // campos que serao usados para cadastro
    protected $fillable = [
        'descricao',
        'id_tratamento'
    ];
}
