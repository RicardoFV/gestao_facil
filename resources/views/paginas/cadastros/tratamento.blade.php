@extends('layouts.app')

@section('content')

<div class="container cadastro">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Tratamento</h1>
        </div>
        <div class="form-row col-sm-12">
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <input type="text" class="form-control col-sm-4 mr-1 ml-2" placeholder="Digite seu nome" />
                <button type="submit" class="btn btn-primary col-4 btn-sm mr-1">Consultor</button>
            </div>
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <button class="btn btn-primary col-sm-4 btn-sm mr-1">Novo</button>
                <button type="submit" class="btn btn-danger col-4 btn-sm mr-1">Deletar</button>
            </div>
        </div>

        <hr />

        <div class="card-body">

            <form method="POST" action="">
                @csrf

                <div class="form-group row">
                    <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Id') }}</label>

                    <div class="col-md-6">
                        <input id="id" type="text" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                    <div class="col-md-6">
                        <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('name') }}" required autocomplete="nome" autofocus>

                        @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="id_sistema" class="col-md-4 col-form-label text-md-right">{{ __('Sistema') }}</label>

                    <div class="col-md-6">
                        <select name="id_sistema" id="id_sistema" class="form-control">
                            <option value="">Sistema 1</option>
                        </select>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="situacao" class="col-md-4 col-form-label text-md-right">{{ __('Situacao') }}</label>

                    <div class="col-md-6">
                        <select name="situacao" id="situacao" class="form-control">
                            <option value="nao_iniciado">Não Iniciada</option>
                            <option value="em_andamento">Em Andamento</option>
                            <option value="parado">Parado</option>
                            <option value="concluido">Concluído</option>
                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_usuario_responsavel" class="col-md-4 col-form-label text-md-right">{{ __('Usuário Responsável') }}</label>

                    <div class="col-md-6">
                        <select name="id_usuario_responsavel" id="id_sistema" class="form-control">
                            <option value="">usuario 1</option>
                        </select>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="id_requisito" class="col-md-4 col-form-label text-md-right">{{ __('Requisito') }}</label>

                    <div class="col-md-6">
                        
                        <select name="id_requisito" id="id_requisito" class="form-control">
                            <option value="">Requisito 1</option>
                            <option value="">Requisito 2</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-block btn-success">
                            {{ __('Cadastrar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- criação da tabela  -->
        <div class="container">
            <table class="table table-hover table-sm">
                <thead class="text-center">
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Sistema</th>
                        <th scope="col">Requisito</th>
                        <th scope="col">Responsável</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
</div>

@endsection
