@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="card mt-1">
            <div class="card-header">
                <h1>Usuário</h1>
            </div>
            <div class="form-row col-sm-12 justify-content-center">
                <div class="form-group col-sm-6 d-flex inline mt-3">
                    <a href="{{ route('users.create') }}" class="btn btn-block btn-primary">Novo Registro</a>
                </div>
            </div>
            <!-- mensagem de Sucesso-->
            @include('mensagens.sucesso')

            <!-- mensagem de erro-->
            @include('mensagens.erro')

            <hr />
            <!--
            <form method="post" action="">
                @csrf
                <div class="form-group ml-4 row mb-4">
                    <label for="" class="col-form-label">Consultar Por :</label>
                    <div class="col-md-2">
                        <select name="tipo_pesquisa" id="tipo_pesquisa" class="form-control">
                            <option value="sistema">Sistema</option>
                            <option value="usuario">Usuario</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="search" name="pesquisa" class="form-control" id="pesquisa"
                               placeholder="Digite a sua Pesquisa">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Filtrar') }}
                        </button>
                    </div>
                </div>
            </form>
        -->
            <!-- criação da tabela  -->
            <div class="container">
                <table class="table table-hover table-sm">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Perfil</th>
                            <th scope="col">Data Acesso</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)

                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->perfil_acesso }}</td>
                            <td>{{ $user->deleted_at }}</td>
                            <td>
                                @if (isset($user->deleted_at))
                                    <a href="{{ action('UsuarioController@consultarUsuarioInativo', $user->id) }}"
                                        class="btn btn-secondary btn-sm">
                                        <i class="fas fa-power-off" alt="ativar"></i>
                                    </a>
                                @endif
                                <a href="{{ action('UsuarioController@edit', $user->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>

                                <a href="{{ action('UsuarioController@show', $user->id) }}" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="align-items-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
