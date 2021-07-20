@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Usuário</h1>

        </div>
        <div class="form-row col-sm-12 justify-content-center">
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{route('usuarios.index')}}" class="btn btn-block btn-primary">Ver Registro</a>
            </div>

        </div>

        <hr />
        <!-- colocando a mensagem de erro -->
        @include('mensagens.erro_cadastro')

        <span class="ml-4 cor_mensagem"> * Campos Obrigatorios </span>

        <div class="card-body">
            <form method="POST" action="{{ route('usuarios.store') }}">
                @csrf

                <div class="row">
                    <div class="col-4">
                        <label for="name">{{ __('Nome') }} <span class="ml-1 cor_mensagem">*</span></label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" >
                    </div>
                    <div class="col-4">
                        <label for="email">{{ __('E-mail') }} <span class="ml-1 cor_mensagem">*</span></label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="col-4">
                        <label for="perfil_acesso">{{ __('Perfil Acesso') }} <span class="ml-1 cor_mensagem">*</span></label>
                         <!-- caso seja super admin-->
                         @can('super_admin', Auth::user())
                         <select id="perfil_acesso" name="perfil_acesso" class="form-control">
                             <option value="super_admin" >Super</option>
                             <option value="administrador" >Administrador(a)</option>
                             <option value="administrador_gestor" >Gestor(a)</option>
                             <option value="desenvolvedor" >Desenvoldor(a)</option>
                             <option value="suporte" >Suporte</option>
                         </select>
                         @endcan
                         <!-- caso seja super administrador-->
                         @can('administrador', Auth::user())
                         <select id="perfil_acesso" name="perfil_acesso" class="form-control">
                             <option value="administrador" >Administrador(a)</option>
                             <option value="administrador_gestor" >Gestor(a)</option>
                             <option value="desenvolvedor" >Desenvoldor(a)</option>
                             <option value="suporte" >Suporte</option>
                         </select>
                         @endcan
                         <!-- caso seja super administrador_gestor-->
                         @can('administrador_gestor', Auth::user())
                         <select id="perfil_acesso" name="perfil_acesso" class="form-control">
                             <option value="administrador_gestor" >Gestor(a)</option>
                             <option value="desenvolvedor" >Desenvoldor(a)</option>
                             <option value="suporte" >Suporte</option>
                         </select>
                         @endcan
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="password">{{ __('Senha') }} <span class="ml-1 cor_mensagem">*</span></label>
                        <input id="password" type="password" class="form-control" name="password">
                    </div>
                    <div class="col">
                        <label for="password-confirm">{{ __('Confirmar Senha') }} <span class="ml-1 cor_mensagem">*</span></label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                    </div>
                  </div>

                <div class="row mb-3 mt-4">
                    <div class="col-md-6 offset-md-3">
                        <button type="submit" class="btn btn-block btn-success">
                            {{ __('Cadastrar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<br><br>



@endsection
