@extends('layouts.app')

@section('content')

<div class="container cadastro">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Sistema</h1>
        </div>
        <div class="form-row col-sm-12 justify-content-center">
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{route('systems.index')}}" class="btn btn-block btn-primary">Ver Registro</a>
            </div>

        </div>

        <hr />
        <!-- colocando a mensagem de erro -->
        @include('mensagens.erro_cadastro')

        <span class="ml-4 cor_mensagem"> * Campos Obrigatorios </span>
        <div class="card-body">
            <form method="POST" action="{{ route('systems.store') }}">
                @csrf

                <div class="row">
                    <div class="col-4">
                        <label for="nome">{{ __('Nome') }}<span class="ml-1 cor_mensagem">*</span></label>
                        <input id="nome" type="text" class="form-control" name="nome" value="{{ old('name') }}">
                    </div>
                    <div class="col-4">
                        <label for="tipo_requisito" >{{ __('Versão') }}<span class="ml-1 cor_mensagem">*</span></label>
                        <select name="id_versao" id="id_versao" class="form-control">
                            @foreach($versoes as $versao)
                                <option value="{{$versao->id}}">{{$versao->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="empresa" >{{ __('Empresa') }}<span class="ml-1 cor_mensagem">*</span></label>
                        <select name="empresa" id="empresa" class="form-control">
                            <option value="empresa">Empresa</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="descricao">{{ __('Descrição') }} <span class="ml-1 cor_mensagem">*</span></label>
                            <textarea name="descricao" placeholder="Digite a descrição" class="form-control" id="descricao" cols="30" rows="3"></textarea>
                    </div>
                </div>

                <div class="row mb-3 mt-4">
                    <div class="col-md-6 offset-md-3">
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
