@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Requisito</h1>
        </div>
        <div class="form-row col-sm-12 justify-content-center">
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{ route('requirements.create')}}" class="btn btn-block btn-primary">Novo Registro</a>
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
                        <th scope="col">Tipo Requisito</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($requisitos as $requisito)
                    <?php
                        // valida o que foi recebido e muda os nomes
                        if($requisito->tipo_requisito === 'funcional'){
                            $requisito->tipo_requisito = 'Funcional';
                        }else if($requisito->tipo_requisito === 'nao_funcional'){
                            $requisito->tipo_requisito = 'Não Funcional';
                        }
                    ?>
                        <tr>
                            <td>{{$requisito->id }}</td>
                            <td>{{$requisito->nome }}</td>
                            <td>{{$requisito->tipo_requisito }}</td>
                            <td>{{$requisito->descricao }}</td>
                            <td>

                                <a href="{{ action('RequisitoController@edit', $requisito->id)}}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>

                                <a href="{{ action('RequisitoController@show', $requisito->id)}}" class="btn btn-danger btn-sm">
                                    <i class="far fa-trash-alt"></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
            </table>
            <div class="align-items-center">
                {{$requisitos->links()}}
            </div>
        </div>
    </div>
</div>


@endsection
