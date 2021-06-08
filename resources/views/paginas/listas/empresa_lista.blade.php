@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="card mt-1">
            <div class="card-header">
                <h1>Empresa</h1>
            </div>
            <div class="form-row col-sm-12 justify-content-center">
                <div class="form-group col-sm-6 d-flex inline mt-3">
                    <a href="{{ route('companies.create') }}" class="btn btn-block btn-primary">Novo Registro</a>
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
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Telefone 1</th>
                            <th scope="col">Situação</th>
                            <th scope="col">Responsável</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">



                    </tbody>
                </table>
                <div class="align-items-center">

                </div>
            </div>
        </div>
    </div>

@endsection
