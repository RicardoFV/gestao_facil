<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamento extends Model
{
    protected $fillable =[
        'descricao',
        'dt_entrega',   
        'situacao',
        'id_usuario_responsavel',  
        'id_usuario',
        'id_requisito',
        'id_sistema'
    ];
    public static function listar(){
        return self::all();
    }
    public static function inserir(array $dados){
        self::create($dados);
    }
}
