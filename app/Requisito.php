<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Requisito extends Model
{
    // campos que serao usados para cadastro
    protected $fillable = [
        'nome',
        'descricao',
        'tipo_requisito',
        'id_usuario',
        'excluido'
    ];
    // lista as informaçoes que estao com o status de excluido igual a 1 (significa comko ativo)
    public static function listar(){
        return DB::select('select * from requisitos where excluido = 1  ');
    }
    // cadastrar as informaçoes
    public static function inserir(array $dados){
        self::create($dados);
    }
    // atualiza as informaçoes
    public static function atualizar(Requisito $requisito){
        $requisito->push();
    }
    // realiza o delete logigo , ou seja seta o excluido = 0 (inativo)
    public static function deletar(Requisito $requisito){
        $requisito->push();
    }
    // consulta tratamento pelo o id do requisito
    public static function consultarTratamentoPorRequisito($id){
        return DB::select('select * from tratamentos where id_requisito ='.$id);   
    }

}
