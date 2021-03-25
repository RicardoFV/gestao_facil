@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Sistema</h1>
        </div>
        <div class="form-row col-sm-12 justify-content-center">
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{ route('systems.create')}}" class="btn btn-block btn-primary">Novo Registro</a>
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
                        <a href="{{ action('SistemaController@edit', $sistema->id)}}" class="btn btn-primary btn-sm">
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                        
                        <a href="{{ action('SistemaController@show', $sistema->id)}}" class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
    </table>
</div>
    </div>
</div>


@endsection