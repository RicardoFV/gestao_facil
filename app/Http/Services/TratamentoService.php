<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\Tratamento;

class TratamentoService
{
    // realiza a consulta dos dados do tratamento, sistema , requisito e usuario ,
    // vai trazer as informaçoes de tratamento, faz toda a listagem
    public static function listar()
    {
        return DB::table('v_list_tsru_dados')->paginate(6);
       // return DB::select('select * from v_list_tsru_dados');
    }
    // traz o ultimo id
    public static function cconsultarUltimoId()
    {
        return Tratamento::all()->max('id');
    }
    //consultar por id
    public static function consultar($id)
    {
        return Tratamento::find($id);
    }

    // consulta que traz os tratamento nos seguintes situacao (novo, nao_iniciado, parado, em_andamento, concluido)
    public static function listarConsultasExpecificas($situacao)
    {
        return DB::table('v_list_tsru_dados')->where('situacao', $situacao)->paginate(6);
       // return DB::select("select * from v_list_tsru_dados where situacao = '$situacao'");
    }
    // listar concluidos
    public static function listarConcluidos()
    {
        return Tratamento::where('situacao', 'concluido')->count();
    }
    // listar novos
    public static function listarNovos()
    {
        return Tratamento::where('situacao', 'novo')->count();
    }
    // listar andamentos
    public static function listarAndamento()
    {
        return Tratamento::where('situacao', 'em_andamento')->count();
    }
    // listar parados
    public static function listarParado()
    {
        return Tratamento::where('situacao', 'parado')->count();
    }
    // listar nao inciado
    public static function listarNaoIniciado()
    {
        return Tratamento::where('situacao', 'nao_iniciado')->count();
    }

    // cadastrar as informaçoes
    public static function inserir(array $dados)
    {
        Tratamento::create($dados);
    }

    // atualiza as informaçoes
    public static function atualizar(Tratamento $tratamento)
    {
        $tratamento->push();
    }
    // realiza o delete logigo , ou seja seta o excluido = 0 (inativo)
    public static function deletar(Tratamento $tratamento)
    {
        return $tratamento->push();
    }
}
