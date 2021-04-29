@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Requisito</h1>
        </div>
        <div class="form-row col-sm-12 justify-content-center">
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{route('requirements.index')}}" class="btn btn-block btn-primary">Ver Registro</a>
            </div>

        </div>

        <hr />

        <!-- colocando a mensagem de erro -->
        @include('mensagens.erro_cadastro')

        <span class="ml-4 cor_mensagem"> * Campos Obrigatorios </span>

        <div class="card-body">

            <form method="POST" action="{{ route('requirements.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}<span class="ml-1 cor_mensagem">*</span></label>

                    <div class="col-md-6">
                        <input id="nome" type="text" class="form-control" name="nome" value="{{ old('name') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tipo_requisito" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Requisito') }}<span class="ml-1 cor_mensagem">*</span></label>

                    <div class="col-md-6">

                        <select name="tipo_requisito" id="tipo_requisito" class="form-control">
                            <option value="funcional">Funcional</option>
                            <option value="nao_funcional">Não Funcional</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }} <span class="ml-1 cor_mensagem">*</span></label>

                    <div class="col-md-6">
                        <textarea name="descricao" placeholder="Digite a descrição" class="form-control" id="descricao" cols="30" rows="3"></textarea>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-block btn-success">
                            {{ __('Cadastrar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>


@endsection
