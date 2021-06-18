<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\Endereco;

class EnderecoService
{
    // lista as informaçoes que estao com o status de excluido igual a 1 (significa comko ativo)
    public static function listar()
    {
        /*
        $requisitos = Requisito::paginate(6);
        foreach ($requisitos as $requisito) {
            if ($requisito->tipo_requisito === 'funcional') {
                $requisito->tipo_requisito = 'Funcional';
            } elseif ($requisito->tipo_requisito === 'nao_funcional') {
                $requisito->tipo_requisito = 'Não Funcional';
            }
        }
       // print_r($requisito->tipo_requisito);
        //dd();

        return $requisitos;
        //return DB::select('select * from requisitos where excluido = 1  ');
        */
    }

    // cadastrar as informaçoes
    public static function inserir(array $dados)
    {
        Endereco::create($dados);
    }
    //consultar por id
    public static function consultar($id)
    {
        return Endereco::find($id);
    }

    //consultar por id
    /*
    public static function consultarPorNomeRequisito($nome)
    {
        return  DB::table('endere')->where('nome', 'LIKE', '%' . $nome . '%');


    }
    */

    // atualiza as informaçoes
    public static function atualizar(Endereco $endereco)
    {
        $endereco->push();
    }
    // realiza o delete logigo , ou seja seta o excluido = 0 (inativo)
    public static function deletar(Endereco $endereco)
    {
        $endereco->push();
    }
    // consulta tratamento pelo o id do requisito
    public static function consultarTratamentoPorRequisito($id)
    {
        return DB::select('select * from tratamentos where id_reWuisito =' . $id);
    }
}
