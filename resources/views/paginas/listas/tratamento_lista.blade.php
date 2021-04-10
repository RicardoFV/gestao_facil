@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Tratamento</h1>
        </div>
        <div class="form-row col-sm-12 justify-content-center">
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{ route('treatments.create')}}" class="btn btn-block btn-primary">Novo Registro</a>
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
                        <th scope="col">Id. Tratamento</th>
                        <th scope="col">N. Sistema</th>
                        <th scope="col">Dt. Inclusão</th>
                        <th scope="col">Usuário Resp.</th>
                        <th scope="col">Situação</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($tratamentos as $tratamento)
                        <tr>
                            <td>{{$tratamento->id }}</td>
                            <td>{{$tratamento->nome_sistema }}</td>
                            <td>{{$tratamento->dt_inclusao }}</td>
                            <td>{{$tratamento->nome_usuario }}</td>
                            <td>{{$tratamento->situacao }}</td>
                            <td>
                                <a href="{{ action('TratamentoController@edit', $tratamento->id)}}" class="btn btn-primary btn-sm">
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