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
    // traz todos os usuarios que tem vinculos, por usuario logado
    public static function listarUsuariosVinculadosSemSuper($id)
    {
        return  DB::select('select u.id, u.name from users u
       where u.id in (select id_gestor from vinculos where id_gestor ='.$id .')');
    }
}
