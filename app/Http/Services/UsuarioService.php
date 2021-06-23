<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use  App\User;

class UsuarioService
{

    // mostra tods ate mesmo os excluidos
    public static function listarTodos()
    {
        // traz todos , id e nome
        return User::all('id', 'name');
    }

    // mostra todos sem o super
    public static function listarTodosSemSuper()
    {
        // traz todos , id e nome
        return DB::select('select id, name from users where perfil_acesso <>
         "super_admin" and deleted_at is null');
    }
    // mostra tods ate mesmo os excluidos
    public static function listar()
    {
        return User::select('id', 'name', 'email', 'perfil_acesso', 'deleted_at', 'created_at')
            ->withTrashed()
            ->paginate(6);
    }

    //consultar por id
    public static function consultar($id)
    {
        return User::find($id);
    }

    //consultar por id do usuario deletado
    public static function consultarUsuarioDeletado($id)
    {
        return User::onlyTrashed()->find($id);
    }

    // lista as informaçoes que estao com o status de excluido igual a 1 (significa comko ativo)
    public static function listarPorUsuarioLogado($id)
    {
        return DB::select('select id, name, email, perfil_acesso, deleted_at, created_at from users where id =' . $id);
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
    // reativa o usuario
    public static function ativarUsuario(User $usuario)
    {
        return $usuario->restore();
    }

    // realiza o delete logigo , ou seja seta o excluido = 0 (inativo)
    public static function deletar(User $usuario)
    {
        return User::destroy($usuario->id);
    }
}
