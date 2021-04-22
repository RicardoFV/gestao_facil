@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Usuário</h1>

        </div>
        <div class="form-row col-sm-12 justify-content-center">
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{ route('users.create')}}" class="btn btn-block btn-primary">Novo Registro</a>
            </div>
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{route('users.index')}}" class="btn btn-block btn-primary">Ver Registro</a>
            </div>
        </div>

        <hr />
        <!-- colocando a mensagem de erro -->
        @include('mensagens.erro_cadastro')

        <div class="card-body">
            <form method="POST" action="{{route('users.update', $usuario->id)}}">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Id') }}</label>

                    <div class="col-md-6">
                        <input id="id" type="text" value="{{$usuario->id}}" class="form-control" readonly/>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" value="{{$usuario->name}}" class="form-control" name="name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" value="{{$usuario->email}}" class="form-control" name="email">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="perfil_acesso" class="col-md-4 col-form-label text-md-right">{{ __('Perfil Acesso') }}</label>

                    <div class="col-md-6">
                        
                        <select id="perfil_acesso" name="perfil_acesso" class="form-control">
                            <option value="administrador" {{ ($usuario->perfil_acesso == 'administrador')? 'selected': ''}}>Administrador(a)</option>
                            <option value="desenvolvedor" {{ ($usuario->perfil_acesso == 'desenvolvedor')? 'selected': ''}}>Desenvoldor(a)</option>
                            <option value="usuario" {{ ($usuario->perfil_acesso == 'usuario')? 'selected': ''}}>Usuário(a)</option>
                        </select>
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
