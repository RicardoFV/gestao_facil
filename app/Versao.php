<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Versao extends Model
{   // nome da tabela 
    protected $table = 'versaos';
    // campos que serao usados para cadastro
    protected $fillable = [
        'nome',
        'id_usuario',
        'excluido'
    ];

    // lista as informaçoes que estao com o status de excluido igual a 1 (significa comko ativo)
    public static function listar(){
        return DB::select('select * from versaos where excluido = 1');
    }
    // cadastrar as informaçoes
    public static function inserir(array $dados){
        self::create($dados);
    }
    // atualiza as informaçoes
    public static function atualizar(Versao $versao){
        $versao->push();
    }
     // realiza o delete logigo , ou seja seta o excluido = 0 (inativo)
    public static function deletar(Versao $versao){
        return $versao->push();
    }
    // consulta sistema pelo o id da versao
    public static function consultarSistemaPorVersao($id){
        return DB::select('select * from sistemas where id_versao ='.$id);
    }

}
