<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\Sistema;

class SistemaService
{
    // consulta que traz a versao e o sistema desde que sistema o campo excluir seja igual a 1 (ativo)
    public static function listarVersaoSistema()
    {
        return DB::select('select * from v_versao_sistema where excluido = 1');
    }
    // cadastrar as informaçoes
    public static function inserir(array $dados)
    {
        Sistema::create($dados);
    }

    //consultar por id
    public static function consultar($id)
    {
        return Sistema::find($id);
    }

    // atualiza as informaçoes
    public static function atualizar(Sistema $sistema)
    {
        $sistema->push();
    }

    // realiza o delete logigo , ou seja seta o excluido = 0 (inativo)
    public static function deletar(Sistema $sistema)
    {
        return $sistema->push();
    }

    public static function consultarTratamentoPorsistema($id)
    {
        return DB::select('select * from tratamentos where id_sistema =' . $id);
    }
}
