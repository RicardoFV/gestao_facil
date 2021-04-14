<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\Tratamento;

class TratamentoService
{
    // realiza a consulta dos dados do tratamento, sistema , requisito e usuario , 
    // vai trazer as informaçoes de tratamento excluido igual a 1 , (ativo)
    public static function listar()
    {
        return DB::select(
            'select 
            tra.id , tra.situacao, tra.created_at as dt_inclusao ,
            sis.id as id_sistema, sis.nome as nome_sistema,
            res.id as id_requisito , res.nome as nome_requisito,
            usuario.id as id_usuario , usuario.name as nome_usuario
            from 
            tratamentos  tra inner join sistemas sis
            on tra.id_sistema = sis.id
            
            inner join requisitos res
            on tra.id_requisito = res.id
            
            inner join users usuario
            on tra.id_usuario_responsavel = usuario.id
            where tra.excluido = 1'
        );
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
        return DB::table('tratamentos')
            ->join('sistemas', 'tratamentos.id_sistema', '=', 'sistemas.id')
            ->join('requisitos', 'tratamentos.id_requisito', '=', 'requisitos.id')
            ->join('users', 'tratamentos.id_usuario_responsavel', '=', 'users.id')
            ->select(
                'tratamentos.id as id_tratamento',
                'tratamentos.situacao',
                'tratamentos.created_at as dt_inclusao',
                'tratamentos.updated_at as finalizado',
                'sistemas.id as id_sistema',
                'sistemas.nome as nome_sistema',
                'requisitos.id as id_requisito',
                'requisitos.nome as nome_requisito',
                'users.id as id_usuario',
                'users.name as nome_usuario_responsavel'
            )->where('tratamentos.excluido', 1)->where('tratamentos.situacao', $situacao)->get();
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
