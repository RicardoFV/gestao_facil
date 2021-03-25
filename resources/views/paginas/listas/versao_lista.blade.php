@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card mt-1">
        <div class="card-header">
            <h1>Versão</h1>
        </div>
        <div class="form-row col-sm-12 justify-content-center">
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{ route('versions.create')}}" class="btn btn-block btn-primary">Novo Registro</a>
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
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-center">

                @foreach($versoes as $versao)
                    <tr>
                        <td>{{$versao->id }}</td>
                        <td>{{$versao->nome }}</td>
                        <td>
                            
                            <a href="{{ action('VersaoController@edit', $versao->id)}}" class="btn btn-primary btn-sm">
                                <i class="fas fa-external-link-alt"></i>
                            </a>

                            <a href="{{ action('VersaoController@show', $versao->id)}}" class="btn btn-danger btn-sm">
                                <i class="far fa-trash-alt"></i>
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
