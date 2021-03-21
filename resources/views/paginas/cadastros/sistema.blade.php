@extends('layouts.app')

@section('content')

<div class="container cadastro">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Sistema</h1>
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
            <form method="POST" action="{{ route('systems.store') }}">
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
                    <label for="id_versao" class="col-md-4 col-form-label text-md-right">{{ __('Versão') }}</label>

                    <div class="col-md-6">
                        <select name="id_versao" id="id_versao" class="form-control">
                            @foreach($versoes as $versao)
                            <option value="{{$versao->id}}">{{$versao->nome}}</option>
                            @endforeach
                        </select>         
                    </div>
                </div>
                <!--
                    <div class="form-group row">
                    <label for="arquivo" class="col-md-4 col-form-label text-md-right">{{ __('Imagem') }}</label>

                    <div class="col-md-6">
                        <input type="file" name="arquivo" class="form-control-file" id="arquivo" />
                    </div>
                </div>
                -->

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
                        <th scope="col">Versão</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($sistemas as $sistema)
                        <tr>
                            <td>{{$sistema->id_sistema }}</td>
                            <td>{{$sistema->nome_sistema }}</td>
                            <td>{{$sistema->nome_versao }}</td>
                            <td>
                                <a href="">Editar</a>
                                <a href="">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>
</div>


@endsection
