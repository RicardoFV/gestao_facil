@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Versão</h1>
        </div>
        <div class="form-row col-sm-12 justify-content-center">
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{ route('versoes.create')}}" class="btn btn-block btn-primary">Novo Registro</a>
            </div>
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{route('versoes.index')}}" class="btn btn-block btn-primary">Ver Registro</a>
            </div>
        </div>

        <hr />

        <!-- colocando a mensagem de erro -->
        @include('mensagens.erro_cadastro')
        <span class="ml-4 cor_mensagem"> * Campos Obrigatorios </span>

        <div class="card-body">

            <form method="post" action="{{route('versoes.update', $versao->id)}}">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-6">
                        <label for="nome">{{ __('Nome') }}<span class="ml-1 cor_mensagem">*</span></label>
                        <input id="nome" type="text" class="form-control" name="nome" value="{{ $versao->nome }}" >
                    </div>
                    <div class="col-4">
                        <label for="empresa" >{{ __('Empresa') }}<span class="ml-1 cor_mensagem">*</span></label>
                        <select name="id_empresa" id="id_empresa" class="form-control">
                            @foreach($empresas as $empresa)
                                <option value="{{ $versao->id_empresa }}" {{ ($versao->id_empresa === $empresa->id)? 'selected': ''}}>{{$empresa->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3 mt-4">
                    <div class="col-md-6 offset-md-3">
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
