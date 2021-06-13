@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Configurações Da Aplicação</h1>
        </div>

        <div class="card-body">

            <div class="row mt-5">

                <div class="col-6">
                    <h1>
                        <a href="{{route('chamados.index') }}" class="badge badge-light">Chamados</a>
                    </h1>
                </div>
                <div class="col-6">
                    <h1>
                        <a href="{{route('empresas.index')}}" class="badge badge-light">Empresas</a>
                    </h1>
                </div>
                <div class="col-6">
                    <h1>
                        <a href="{{route('enderecos.index')}}" class="badge badge-light">Endereços</a>
                    </h1>
                </div>
                <div class="col-6">
                    <h1>
                        <a href="{{route('requisitos.index') }}" class="badge badge-light">Requisitos</a>
                    </h1>
                </div>
                <div class="col-6">
                    <h1>
                        <a href="{{route('sistemas.index') }}" class="badge badge-light">Sistemas</a>
                    </h1>
                </div>

                <div class="col-6">
                    <h1>
                        <a href="{{ route('usuarios.index') }}" class="badge badge-light">Usuários</a>
                    </h1>
                </div>

                <div class="col-6">
                    <h1>
                        <a href="{{route('versoes.index') }}" class="badge badge-light">Versões</a>
                    </h1>
                </div>
                <div class="col-6">
                    <h1>
                        <a href="{{route('vinculos.index')}}" class="badge badge-light">Vinculos</a>
                    </h1>
                </div>

            </div>


        </div>
    </div>







</div>


@endsection
