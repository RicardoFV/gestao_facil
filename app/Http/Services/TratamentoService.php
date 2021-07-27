<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\{Tratamento, Requisito, User};

class TratamentoService
{
    // realiza a consulta dos dados do tratamento, sistema , requisito e usuario ,
    // vai trazer as informaçoes de tratamento, faz toda a listagem
    public static function listar()
    {
        return DB::table('v_list_tsru_dados')->paginate(6);
        // return DB::select('select * from v_list_tsru_dados');
    }

    // realiza a consulta por sistema, listando no relatorio
    public static function consultarPorSistema($sistema)
    {
        return DB::table('v_list_tsru_dados')
            ->where('nome_sistema', 'LIKE', '%' . $sistema . '%');
    }

    // realiza a consulta por usuario, listando no relatorio
    public static function consultarPorUsuario($usuario)
    {
        return DB::table('v_list_tsru_dados')
            ->where('nome_usuario', 'LIKE', '%' . $usuario . '%')
            ->paginate(6);
    }

    // lista as informaçoes que estao com o status de excluido igual a 1 (significa comko ativo)
    public static function listarUsuario()
    {
        return User::all('id', 'name', 'email', 'perfil_acesso', 'created_at')
            ->where('perfil_acesso' ,'<>', 'super_admin');
        //return DB::select('select id, name, email, perfil_acesso, excluido, created_at  from users where excluido = 1 ');
    }

    // lista as informaçoes que estao com o status de excluido igual a 1 (significa comko ativo)
    public static function listarRequisitoPorGestor($id)
    {
        return Requisito::all();
            /*DB::table('v_requisito')
            ->where('excluido', 1)
            ->where('id_gestor', $id)->distinct('nome');
            */
        //
        //return DB::select('select * from requisitos where excluido = 1  ');
    }

    // consulta que traz a versao e o sistema desde que sistema o campo excluir seja igual a 1 (ativo)
    public static function listarVersaoSistema()
    {
        return DB::table('v_versao_sistema')->where('excluido', 1)->get();
        //return DB::select('select * from v_versao_sistema where excluido = 1');
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
