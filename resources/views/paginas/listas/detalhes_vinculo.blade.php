@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Meus Vinculos</h1>
        </div>
        <div class="form-row col-sm-12 justify-content-center">
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{route('vinculos.create')}}" class="btn btn-block btn-primary">Novo Vinculo</a>
            </div>
        </div>
        <hr>
        <!-- criação da tabela  -->
        <div class="container">
            <table class="table table-hover table-sm">
                <thead class="text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Profissional</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-center">

                </tbody>
            </table>

        </div>
    </div>
</div>


@endsection
