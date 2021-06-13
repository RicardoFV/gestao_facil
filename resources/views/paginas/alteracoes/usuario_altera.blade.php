@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Usuário</h1>

        </div>
        <div class="form-row col-sm-12 justify-content-center">
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{ route('usuarios.create')}}" class="btn btn-block btn-primary">Novo Registro</a>
            </div>
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{route('usuarios.index')}}" class="btn btn-block btn-primary">Ver Registro</a>
            </div>
        </div>

        <hr />
        <!-- colocando a mensagem de erro -->
        @include('mensagens.erro_cadastro')

        <span class="ml-4 cor_mensagem"> * Campos Obrigatorios </span>

        <div class="card-body">
            <form method="POST" action="{{route('usuarios.update', $usuario->id)}}">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Id') }}</label>

                    <div class="col-md-6">
                        <input id="id" type="text" value="{{$usuario->id}}" class="form-control" readonly/>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }} <span class="ml-1 cor_mensagem">*</span></label>

                    <div class="col-md-6">
                        <input id="name" type="text" value="{{$usuario->name}}" class="form-control" name="name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }} <span class="ml-1 cor_mensagem">*</span></label>

                    <div class="col-md-6">
                        <input id="email" type="email" value="{{$usuario->email}}" class="form-control" name="email">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="perfil_acesso" class="col-md-4 col-form-label text-md-right">{{ __('Perfil Acesso') }} <span class="ml-1 cor_mensagem">*</span></label>

                    <div class="col-md-6">
                         <!-- caso seja super admin-->
                         @can('super_admin', Auth::user())
                         <select id="perfil_acesso" name="perfil_acesso" class="form-control">
                            <option value="super_admin" {{ ($usuario->perfil_acesso == 'super_admin')? 'selected': ''}}>Super</option>
                            <option value="administrador" {{ ($usuario->perfil_acesso == 'administrador')? 'selected': ''}}>Administrador(a)</option>
                            <option value="administrador_gestor" {{ ($usuario->perfil_acesso == 'administrador_gestor')? 'selected': ''}}>Gestor(a)</option>
                            <option value="desenvolvedor" {{ ($usuario->perfil_acesso == 'desenvolvedor')? 'selected': ''}}>Desenvoldor(a)</option>
                            <option value="suporte" {{ ($usuario->perfil_acesso == 'suporte')? 'selected': ''}}>Suporte</option>
                        </select>
                         @endcan

                         @can('administrador', Auth::user())
                         <select id="perfil_acesso" name="perfil_acesso" class="form-control">
                            <option value="administrador" {{ ($usuario->perfil_acesso == 'administrador')? 'selected': ''}}>Administrador(a)</option>
                            <option value="administrador_gestor" {{ ($usuario->perfil_acesso == 'administrador_gestor')? 'selected': ''}}>Gestor(a)</option>
                            <option value="desenvolvedor" {{ ($usuario->perfil_acesso == 'desenvolvedor')? 'selected': ''}}>Desenvoldor(a)</option>
                            <option value="suporte" {{ ($usuario->perfil_acesso == 'suporte')? 'selected': ''}}>Suporte</option>
                        </select>
                         @endcan

                         @can('administrador_gestor', Auth::user())
                         <select id="perfil_acesso" name="perfil_acesso" class="form-control">
                            <option value="administrador_gestor" {{ ($usuario->perfil_acesso == 'administrador_gestor')? 'selected': ''}}>Gestor(a)</option>
                            <option value="desenvolvedor" {{ ($usuario->perfil_acesso == 'desenvolvedor')? 'selected': ''}}>Desenvoldor(a)</option>
                            <option value="suporte" {{ ($usuario->perfil_acesso == 'suporte')? 'selected': ''}}>Suporte</option>
                        </select>
                         @endcan

                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-block btn-success">
                            {{ __('Atualizar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
