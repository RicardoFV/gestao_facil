@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card mt-1">
            <div class="card-header">
                <h1>Meus Vinculos</h1>
            </div>
            <div class="form-row col-sm-12 justify-content-center">
                <div class="form-group col-sm-6 d-flex inline mt-3">
                    <a href="{{ route('vinculos.create') }}" class="btn btn-block btn-primary">Novo Vinculo</a>
                </div>
            </div>
            <hr>

            <h2 class="m-3 text-center">Nome Profissioanl : <span>{{ $usuario->name }}</span></h2>
            <!-- criação da tabela  -->
            <div class="container">
                <table class="table table-hover table-sm">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Cnpj</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($empresas as $empresa)
                            <tr>
                                <td>{{ $empresa->id_vinculo }}</td>
                                <td>{{ $empresa->nome_empresa }}</td>
                                <td>{{ $empresa->cnpj }}</td>
                                <td>{{ $empresa->telefone_1 }}</td>
                                <td>
                                    <a href="{{ action('VinculoController@show', $empresa->id_vinculo) }}"
                                        class="btn btn-danger btn-sm">
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
