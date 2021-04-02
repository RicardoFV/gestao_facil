@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-1">
        <div class="card-header">
            <h1 class="text-center">Acesso Não Autorizado </h1>
        </div>
        <div class="form-row col-sm-12 justify-content-center">
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{ url('/') }}" class="btn btn-block btn-primary">Tela Incial</a>
            </div>
            
        </div>

        <!-- criação da tabela  -->
        <div class="container">
            <p class="text-center">
                Você não tem acesso a essa atividade, verifique suas permissões com o 
                Administrador do Sistema.
            </p>
        </div>
    </div>
</div>
@endsection