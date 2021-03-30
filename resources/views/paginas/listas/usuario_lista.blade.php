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
        </div>
        <!-- mensagem de Sucesso-->
            @include('mensagens.sucesso') 

        <!-- mensagem de erro-->
            @include('mensagens.erro')

        <hr />

       <!-- criação da tabela  -->
       <div class="container">
        <table class="table table-hover table-sm">
            <thead class="text-center">
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Perfil</th>
                    <th scope="col">Dt Inclusão</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id }}</td>
                    <td>{{$user->name }}</td>
                    <td>{{$user->email }}</td>
                    <td>{{$user->perfil_acesso }}</td>
                    <td>{{$user->created_at }}</td>
                    <td>
                        <a href="{{ action('UsuarioController@edit', $user->id)}}" class="btn btn-primary btn-sm">
                            <i class="fas fa-external-link-alt"></i>
                        </a>

                        <a href="{{ action('UsuarioController@show', $user->id)}}" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    </div>
</div>

@endsection
