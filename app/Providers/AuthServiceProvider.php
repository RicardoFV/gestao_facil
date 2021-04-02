<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // cria as permissoes 
        Gate::define('administrador', function(User $usuario){
            return $usuario->perfil_acesso == 'administrador';
        });
        Gate::define('desenvolvedor', function(User $usuario){
            return $usuario->perfil_acesso == 'desenvolvedor';
        });
        Gate::define('usuario', function(User $usuario){
            return $usuario->perfil_acesso == 'usuario';
        });

        // verificando se o tipo de usuario pode acessar determianda parte do sistema
        Gate::allows('administrador');
        Gate::allows('desenvolvedor');
        Gate::allows('usuario');
        
    }
}
