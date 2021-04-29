@extends('layouts.app')

@section('content')

<div class="container cadastro">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Sistema</h1>
        </div>
        <div class="form-row col-sm-12 justify-content-center">

            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{route('systems.create')}}" class="btn btn-block btn-primary">Novo Registro</a>
            </div>
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{route('systems.index')}}" class="btn btn-block btn-primary">Ver Registro</a>
            </div>

        </div>

        <hr />
        <!-- colocando a mensagem de erro -->
        @include('mensagens.erro_cadastro')

        <span class="ml-4 cor_mensagem"> * Campos Obrigatorios </span>

        <div class="card-body">
            <form method="POST" action="{{ route('systems.update', $sistema->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Id') }}</label>

                    <div class="col-md-6">
                        <input id="id" type="text" class="form-control" value="{{$sistema->id}}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }} <span class="ml-1 cor_mensagem">*</span></label>

                    <div class="col-md-6">
                        <input id="nome" type="text" class="form-control" name="nome" value="{{$sistema->nome}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="id_versao" class="col-md-4 col-form-label text-md-right">{{ __('Versão') }} <span class="ml-1 cor_mensagem">*</span></label>

                    <div class="col-md-6">
                        <select name="id_versao" id="id_versao" class="form-control">
                            @foreach($versoes as $versao)
                                <option value="{{ $sistema->id_versao }}" {{ ($sistema->id_versao === $versao->id)? 'selected': ''}}>{{$versao->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!--
                    <div class="form-group row">
                    <label for="arquivo" class="col-md-4 col-form-label text-md-right">{{ __('Imagem') }} </label>

                    <div class="col-md-6">
                        <input type="file" name="arquivo" class="form-control-file" id="arquivo" />
                    </div>
                </div>
                -->

                <div class="form-group row">
                    <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }} <span class="ml-1 cor_mensagem">*</span></label>

                    <div class="col-md-6">
                        <textarea  name="descricao" placeholder="Digite a descrição" class="form-control" id="descricao" cols="30" rows="3">
                            {{$sistema->descricao}}
                        </textarea>
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
