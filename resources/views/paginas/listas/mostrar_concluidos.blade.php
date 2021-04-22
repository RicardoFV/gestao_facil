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
        <hr>
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
                    @foreach($status as $situacao)
                        <tr>
                            <td>{{ $situacao->id_tratamento }}</td>
                            <td>{{ $situacao->nome_sistema }}</td>
                            <td>{{ $situacao->dt_inclusao }}</td>
                            <td>{{ $situacao->nome_usuario }}</td>
                            <td>{{ $situacao->situacao }}</td>
                            <td>
                                <a href="{{ action('TratamentoController@edit', $situacao->id_tratamento)}}" class="btn btn-primary btn-sm">
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