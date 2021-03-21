@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Requisito</h1>
        </div>
        <div class="form-row col-sm-12">
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{ route('requirements.create')}}" class="btn btn-block btn-primary">Novo Registro</a>
            </div>
            
        </div>

        <hr />

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