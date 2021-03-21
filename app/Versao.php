<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Versao extends Model
{
    protected $table = 'versaos';
    protected $fillable = [
        'nome',
        'id_usuario'
    ];


    public static function listar(){
        return self::all();
    }

    public static function inserir(array $dados){
        self::create($dados);
    }
    public static function atualizar(Versao $versao){
        $versao->push();
    }

    public static function deletar($id){
        return self::destroy($id);
    }
    public static function consultarSistemaPorVersao($id){
        return DB::select('select * from sistemas where id_versao ='.$id);
    }

}
