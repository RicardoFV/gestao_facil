<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // campos que serao usados para cadastro
    protected $fillable = [
        'name', 'email', 'password', 'perfil_acesso', 'excluido', 'id_usuario_ressponsavel'
    ];

    // excluido 0 - sim 
    // excluido 1 - nao

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // lista as informaçoes que estao com o status de excluido igual a 1 (significa comko ativo)
    public static function listar()
    {
        return DB::select('select id, name, email, perfil_acesso, excluido, created_at  from users where excluido = 1 ');
    }

    // lista as informaçoes que estao com o status de excluido igual a 1 (significa comko ativo)
    public static function listarPorUsuarioLogado($id)
    {
        return DB::select('select id, name, email, perfil_acesso, excluido, created_at  from users where id =' . $id);
    }

    // cadastrar as informaçoes
    public static function inserir(array $dados)
    {
        self::create($dados);
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
