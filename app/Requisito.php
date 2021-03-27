<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Requisito extends Model
{
    // campos que serao usados para cadastros
    protected $fillable = [
        'nome',
        'descricao',
        'tipo_requisito',
        'id_usuario',
        'excluido'
    ];

    public static function listar(){
        return DB::select('select * from requisitos where excluido = 1  ');
    }

    public static function inserir(array $dados){
        self::create($dados);
    }

    public static function atualizar(Requisito $requisito){
        $requisito->push();
    }

    public static function deletar(Requisito $requisito){
        $requisito->push();
    }

    public static function consultarTratamentoPorRequisito($id){
        return DB::select('select * from tratamentos where id_requisito ='.$id);   
    }

}
