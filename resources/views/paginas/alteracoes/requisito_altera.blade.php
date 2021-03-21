@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Requisito</h1>
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

            <form method="POST" action="{{ route('requirements.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Id') }}</label>

                    <div class="col-md-6">
                        <input id="id" type="text" class="form-control" readonly/>

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
                    <label for="tipo_requisito" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Requisito') }}</label>

                    <div class="col-md-6">
                        
                        <select name="tipo_requisito" id="tipo_requisito" class="form-control">
                            <option value="funcional">Funcional</option>
                            <option value="nao_funcional">Não Funcional</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>

                    <div class="col-md-6">
                        <textarea name="descricao" placeholder="Digite a descrição" class="form-control" id="descricao" cols="30" rows="3"></textarea>
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
                        <th scope="col">Tipo Requisito</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($requisitos as $requisito)
                        <tr>
                            <td>{{$requisito->id }}</td>
                            <td>{{$requisito->nome }}</td>
                            <td>{{$requisito->tipo_requisito }}</td>
                            <td>{{$requisito->descricao }}</td>
                            <td>
                                <a href="">Editar</a>
                                <a href="">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

            </table>
        </div>
    </div>
</div>


@endsection