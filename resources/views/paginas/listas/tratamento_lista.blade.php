@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card mt-1">
            <div class="card-header">
                <h1>Tratamento</h1>
            </div>
            <div class="form-row col-sm-12 justify-content-center">
                <div class="form-group col-sm-6 d-flex inline mt-3">
                    <a href="{{ route('treatments.create') }}" class="btn btn-block btn-primary">Novo Registro</a>
                </div>
            </div>

            <!-- mensagem de Sucesso-->
            @include('mensagens.sucesso')

            <!-- mensagem de erro-->
            @include('mensagens.erro')

            <!-- colocando a mensagem de erro -->
            @include('mensagens.erro_cadastro')

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
                            <input type="search" name="pesquisa" class="form-control" id="pesquisa" placeholder="Digite a sua Pesquisa">
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
                            <th scope="col">Id. Tratamento</th>
                            <th scope="col">N. Sistema</th>
                            <th scope="col">Dt. Inclusão</th>
                            <th scope="col">Usuário Resp.</th>
                            <th scope="col">Situação</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($tratamentos as $tratamento)
                            <tr>
                                <td>{{ $tratamento->id_tratamento }}</td>
                                <td>{{ $tratamento->nome_sistema }}</td>
                                <td>{{ $tratamento->dt_inclusao }}</td>
                                <td>{{ $tratamento->nome_usuario }}</td>
                                <td>{{ $tratamento->situacao }}</td>
                                <td>
                                    <a href="{{ action('TratamentoController@edit', $tratamento->id_tratamento) }}"
                                        class="btn btn-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
