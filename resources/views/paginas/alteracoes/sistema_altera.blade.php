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

        <div class="card-body">
            <form method="POST" action="{{ route('systems.update', $sistema->id) }}">
                @csrf

                <div class="form-group row">
                    <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Id') }}</label>

                    <div class="col-md-6">
                        <input id="id" type="text" class="form-control" value="{{$sistema->id}}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                    <div class="col-md-6">
                        <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{$sistema->nome}}" required autocomplete="nome" autofocus>

                        @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="id_versao" class="col-md-4 col-form-label text-md-right">{{ __('Versão') }}</label>

                    <div class="col-md-6">
                        <select name="id_versao" id="id_versao" class="form-control">
                            @foreach($versoes as $versao)
                            <option value="{{$versao->id}}">{{$versao->nome}}</option>
                            @endforeach
                        </select>         
                    </div>
                </div>
                <!--
                    <div class="form-group row">
                    <label for="arquivo" class="col-md-4 col-form-label text-md-right">{{ __('Imagem') }}</label>

                    <div class="col-md-6">
                        <input type="file" name="arquivo" class="form-control-file" id="arquivo" />
                    </div>
                </div>
                -->

                <div class="form-group row">
                    <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>

                    <div class="col-md-6">
                        <textarea name="descricao" placeholder="Digite a descrição" class="form-control" id="descricao" cols="30" rows="3">
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
