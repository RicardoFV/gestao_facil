@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Requisito</h1>
        </div>
        <div class="form-row col-sm-12 justify-content-center">
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{route('requisitos.create')}}" class="btn btn-block btn-primary">Novo Registro</a>
            </div>
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{route('requisitos.index')}}" class="btn btn-block btn-primary">Ver Registro</a>
            </div>
        </div>

        <hr />
        <!-- colocando a mensagem de erro -->
        @include('mensagens.erro_cadastro')

        <span class="ml-4 cor_mensagem"> * Campos Obrigatorios </span>

        <div class="card-body">

            <form method="POST" action="{{route('requisitos.update', $requisito->id)}}">
                @csrf
                @method('PUT')

                <div class="row">
                    <!--
                    <div class="col-1">
                        <label for="id"></label>
                        <input id="id" type="text" value="{{$requisito->id}}" class="form-control" readonly/>
                    </div>
                    -->
                    <div class="col-4">
                        <label for="nome">{{ __('Nome') }} <span class="ml-1 cor_mensagem">*</span></label>
                        <input id="nome" type="text" class="form-control"  name="nome" value="{{$requisito->nome}}" >
                    </div>
                    <div class="col-4">
                        <label for="tipo_requisito">{{ __('Tipo Requisito') }} <span class="ml-1 cor_mensagem">*</span></label>
                        <select name="tipo_requisito" id="tipo_requisito" class="form-control">
                            <option value="funcional" {{ ($requisito->tipo_requisito == 'funcional')? 'selected': ''}}>Funcional</option>
                            <option value="nao_funcional" {{ ($requisito->tipo_requisito == 'nao_funcional')? 'selected': ''}}>Não Funcional</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="empresa" >{{ __('Empresa') }}<span class="ml-1 cor_mensagem">*</span></label>
                        <select name="tipo_reqempresauisito" id="empresa" class="form-control">
                            <option value="empresa">Empresa</option>
                        </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                        <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }} <span class="ml-1 cor_mensagem">*</span></label>
                        <textarea  name="descricao" placeholder="Digite a descrição" class="form-control" id="descricao" cols="30" rows="3">
                            {{$requisito->descricao}}
                        </textarea>
                    </div>
                  </div>

                <div class="row mb-3 mt-4">
                    <div class="col-md-6 offset-md-2">
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
