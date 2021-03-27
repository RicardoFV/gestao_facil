<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Versao extends Model
{
    protected $table = 'versaos';
    protected $fillable = [
        'nome',
        'id_usuario',
        'excluido'
    ];


    public static function listar(){
        return DB::select('select * from versaos where excluido = 1');
    }

    public static function inserir(array $dados){
        self::create($dados);
    }
    public static function atualizar(Versao $versao){
        $versao->push();
    }

    public static function deletar(Versao $versao){
        return $versao->push();
    }
    public static function consultarSistemaPorVersao($id){
        return DB::select('select * from sistemas where id_versao ='.$id);
    }

}
