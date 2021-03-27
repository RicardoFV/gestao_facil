<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sistema extends Model
{
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
    // feito uma uniao de tabela com o intuito de trazer melhor as informaçoes 
    public static function listarVersaoSistema(){
        return DB::select('select v.id as id, s.id as id_sistema, v.nome as nome_versao , s.nome as nome_sistema, s.descricao as descricao from versaos v inner join sistemas s 
        on v.id = s.id_versao where s.excluido = 1');
    }

    public static function inserir(array $dados){
        self::create($dados);
    }

    public static function atualizar(Sistema $sistema){
        $sistema->push();
    }

    public static function deletar(Sistema $sistema){
        return $sistema->push();
    }

    public static function consultarTratamentoPorsistema($id){
        return DB::select('select * from tratamentos where id_sistema ='.$id);   
    }

   

}
