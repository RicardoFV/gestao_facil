@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Versão</h1>
        </div>
        <div class="form-row col-sm-12 justify-content-center">
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{ route('versions.create')}}" class="btn btn-block btn-primary">Novo Registro</a>
            </div>
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{route('versions.index')}}" class="btn btn-block btn-primary">Ver Registro</a>
            </div>
        </div>

        <hr />

        <!-- colocando a mensagem de erro -->
        @include('mensagens.erro_cadastro')
        <span class="ml-4 cor_mensagem"> * Campos Obrigatorios </span>

        <div class="card-body">

            <form method="post" action="{{route('versions.update', $versao->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Id') }}</label>

                    <div class="col-md-6">
                        <input id="id" type="text" value="{{ $versao->id }}" class="form-control" readonly/>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }} <span class="ml-1 cor_mensagem">*</span></label>

                    <div class="col-md-6">
                        <input id="nome" type="text" class="form-control" name="nome" value="{{ $versao->nome }}" >
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-block btn-success">
                            {{ __('Atualizar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection
