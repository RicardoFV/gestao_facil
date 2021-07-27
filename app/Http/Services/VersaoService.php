<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\Versao;

class VersaoService
{
    // lista as informaçoes que estao com o status de excluido igual a 1 (significa comko ativo)
    public static function listar()
    {
        return Versao::where('excluido', 1)->paginate(4);
        //return DB::select('select * from versaos where excluido = 1');
    }

    // lista as informaçoes que estao com o status de excluido igual a 1 (significa comko ativo)
    public static function listarTodosPorParametro($id)
    {
        return DB::table('v_versao')
            ->where('excluido', 1)
            ->where('id_gestor', $id)->distinct('nome')
            ->paginate(4);
    }

    // cadastrar as informaçoes
    public static function inserir(array $dados)
    {
        Versao::create($dados);
    }

    //consultar por id
    public static function consultar($id)
    {
        return Versao::find($id);
    }

    // atualiza as informaçoes
    public static function atualizar(Versao $versao)
    {
        $versao->push();
    }

    // realiza o delete logigo , ou seja seta o excluido = 0 (inativo)
    public static function deletar(Versao $versao)
    {
        return $versao->push();
    }

    // consulta sistema pelo o id da versao
    public static function consultarSistemaPorVersao($id)
    {
        return DB::select('select * from sistemas where id_versao =' . $id);
    }
}
