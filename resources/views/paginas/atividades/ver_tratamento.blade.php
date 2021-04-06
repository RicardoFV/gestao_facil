@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Meus Tratamentos</h1>
        </div>
        <!-- criação da tabela  -->
        <div class="container">
            <table class="table table-hover table-sm">
                <thead class="text-center">
                    <tr>
                        <th scope="col">Id. Tratamento</th>
                        <th scope="col">N. Sistema</th>
                        <th scope="col">Dt. Inclusão</th>
                        <th scope="col">Descriçao</th>
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
                            <td>{{ $situacao->descricao }}</td>
                            <td>{{ $situacao->nome_usuario_responsavel }}</td>
                            <td>{{ $situacao->situacao }}</td>
                            <td>
                                <a href="" class="btn btn-info btn-sm">
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