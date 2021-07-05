<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\Vinculo;

class VinculoService
{
    // cadastrar vinculo
    public static function inserir(array $dados)
    {
        Vinculo::create($dados);
    }

    //consultar por id
    public static function consultar($id)
    {
        return Vinculo::find($id);
    }
    // verificar se tem vinculo
    public static function verificarVinculo($id_gestor, $id_empresa)
    {
        return Vinculo::where([
            'id_gestor' => $id_gestor,
            'id_empresa' => $id_empresa
        ])->count();
    }
    // traz todos os usuarios que tem vinculos
    public static function listarUsuariosVinculados()
    {
        return  DB::select('select u.id, u.name from users u
       where u.id in (select id_gestor from vinculos)');
    }
    // traz todos os usuarios que tem vinculos sem super
    public static function listarUsuariosVinculadosSemSuper()
    {
        return  DB::select('select u.id, u.name from users u
        where u.id in (select id_gestor from vinculos)
        and u.perfil_acesso <> "super_admin" ');
    }
    // traz todos os usuarios que tem vinculos sem super
    public static function listarUsuariosVinculadosSemSuperSemAdministrador()
    {
        return  DB::select('select u.id, u.name from users u
         where u.id in (select id_gestor from vinculos)
         and u.perfil_acesso <> "super_admin"
         and u.perfil_acesso <> "administrador"');
    }

    // traz todos os usuarios que tem vinculos, por usuario logado
    public static function listarUsuariosVinculadosPorDesenvolvedorEUsuario($id)
    {
        return  DB::select('select u.id, u.name from users u
       where u.id in (select id_gestor from vinculos where id_gestor =' . $id . ')');
    }
    // mostra as empresas vinculadas ao usuario
    public static function detalhesEmpresaVinculo($id)
    {
        return DB::table('vinculos')
            ->join('empresas', 'vinculos.id_empresa', '=', 'empresas.id')
            ->select(
                'vinculos.id as id_vinculo',
                'vinculos.id_gestor',
                'vinculos.id_usuario_responsavel',
                'empresas.id as id_empresa',
                'empresas.name as nome_empresa',
                'empresas.cnpj',
                'empresas.telefone_1'
            )
            ->where('vinculos.id_gestor', $id)
            ->get();
    }

    // realiza a deleçao do vinculo
    public static function deletar(Vinculo $vinculo)
    {
        return Vinculo::destroy($vinculo->id);
    }
}
