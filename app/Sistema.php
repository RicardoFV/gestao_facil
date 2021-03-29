<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sistema extends Model
{
    // campos que serao usados para cadastro
    protected $fillable = [
        'nome',
        'imagem',
       // 'caminho_imagem',
        //'nome_imagem',
        'descricao',
        'id_usuario',
        'id_versao',
        'excluido'
    ];
    // consulta que traz a versao e o sistema desde que sistema o campo excluir seja igual a 1 (ativo)
    public static function listarVersaoSistema(){
        return DB::select('select v.id as id, s.id as id_sistema, v.nome as nome_versao , s.nome as nome_sistema, s.descricao as descricao from versaos v inner join sistemas s 
        on v.id = s.id_versao where s.excluido = 1');
    }
    // cadastrar as informaçoes
    public static function inserir(array $dados){
        self::create($dados);
    }

    // atualiza as informaçoes
    public static function atualizar(Sistema $sistema){
        $sistema->push();
    }

     // realiza o delete logigo , ou seja seta o excluido = 0 (inativo)
    public static function deletar(Sistema $sistema){
        return $sistema->push();
    }

    public static function consultarTratamentoPorsistema($id){
        return DB::select('select * from tratamentos where id_sistema ='.$id);   
    }

   

}
