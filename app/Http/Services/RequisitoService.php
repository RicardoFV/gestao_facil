<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\Requisito;

class RequisitoService
{
    // lista as informaçoes que estao com o status de excluido igual a 1 (significa comko ativo)
    public static function listar()
    {
        return DB::select('select * from requisitos where excluido = 1  ');
    }

    // cadastrar as informaçoes
    public static function inserir(array $dados)
    {
        Requisito::create($dados);
    }
    //consultar por id
    public static function consultar($id)
    {
        return Requisito::find($id);
    }
    // atualiza as informaçoes
    public static function atualizar(Requisito $requisito)
    {
        $requisito->push();
    }
    // realiza o delete logigo , ou seja seta o excluido = 0 (inativo)
    public static function deletar(Requisito $requisito)
    {
        $requisito->push();
    }
    // consulta tratamento pelo o id do requisito
    public static function consultarTratamentoPorRequisito($id)
    {
        return DB::select('select * from tratamentos where id_requisito =' . $id);
    }
}
