<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vinculo extends Model
{
    protected $fillable = ['id_gestor', 'id_empresa','id_usuario_responsavel'];
}
