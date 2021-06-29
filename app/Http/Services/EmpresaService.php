<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\Empresa;

class EmpresaService
{
    // mostra tods ate mesmo os excluidos
    public static function listar()
    {
        return Empresa::select('*')->withTrashed()->paginate(5);
    }
    // litar todas as empresas
    public static function listarTodas()
    {
        return Empresa::all('id', 'name');
    }
    // litar todas as empresas por responsavel
    public static function listarTodasPorResponsavel($id)
    {
        return DB::select('select e.id , e.name from empresas e inner join vinculos v
         on v.id_empresa = e.id
         where id_gestor =' . $id);
    }
    // cadastrar as informaçoes
    public static function inserir(array $dados)
    {
        Empresa::create($dados);
    }
    //consultar por id
    public static function consultar($id)
    {
        return Empresa::find($id);
    }

    //consultar por id da empresa deletada
    public static function consultarEmpresaDeletada($id)
    {
        return Empresa::onlyTrashed()->find($id);
    }
    // reativa a empresa
    public static function ativarEmpresa(Empresa $empresa)
    {
        return $empresa->restore();
    }

    // atualiza as informaçoes
    public static function atualizar(Empresa $versao)
    {
        $versao->push();
    }

    // realiza o delete logigo , ou seja seta o excluido = 0 (inativo)
    public static function deletar(Empresa $empresa)
    {
        return Empresa::destroy($empresa->id);
    }
}
