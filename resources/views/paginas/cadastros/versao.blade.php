@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Versão</h1>
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

            <form method="POST" action="{{route('versions.store')}}">
                @csrf

                <div class="form-group row">
                    <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Id') }}</label>

                    <div class="col-md-6">
                        <input id="id" type="text" value="{{ old('id') }}" " class="form-control" readonly/>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                    <div class="col-md-6">
                        <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome">

                        @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                @foreach($versoes as $versao)
                    <tr>
                        <td>{{$versao->id }}</td>
                        <td>{{$versao->nome }}</td>
                        <td>
                            <a href="{{ action('VersaoController@show', $versao->id)}}">Editar</a>
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
