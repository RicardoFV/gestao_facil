<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use  App\User;

class UsuarioService
{
    // lista as informaçoes que estao com o status de excluido igual a 1 (significa comko ativo)
    public static function listar()
    {
        return DB::select('select id, name, email, perfil_acesso, excluido, created_at  from users where excluido = 1 ');
    }

    //consultar por id
    public static function consultar($id)
    {
        return User::find($id);
    }

    // lista as informaçoes que estao com o status de excluido igual a 1 (significa comko ativo)
    public static function listarPorUsuarioLogado($id)
    {
        return DB::select('select id, name, email, perfil_acesso, excluido, created_at  from users where id =' . $id);
    }

    // cadastrar as informaçoes
    public static function inserir(array $dados)
    {
        User::create($dados);
    }
    // atualiza as informaçoes
    public static function atualizar(User $usuario)
    {
        $usuario->push();
    }

    // realiza o delete logigo , ou seja seta o excluido = 0 (inativo)
    public static function deletar(User $usuario)
    {
        return $usuario->push();
    }
}
