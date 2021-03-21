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
        'id_versao'
    ];
    // feito uma uniao de tabela com o intuito de trazer melhor as informaçoes 
    public static function listarVersaoSistema(){
        return DB::select('select v.id as id, s.id as id_sistema, v.nome as nome_versao , s.nome as nome_sistema from versaos v inner join sistemas s 
        on v.id = s.id_versao');
    }

    public static function inserir(array $dados){
        self::create($dados);
    }

   

}
