@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card mt-1">
            <div class="card-header">
                <h1>Vincular Profissional</h1>
            </div>
            <div class="form-row col-sm-12 justify-content-center">
                <div class="form-group col-sm-6 d-flex inline mt-3">
                    <a href="{{ route('vinculos.index') }}" class="btn btn-block btn-primary">Ver Registro</a>
                </div>
            </div>

            <hr />
            <!-- colocando a mensagem de erro -->
            @include('mensagens.erro_cadastro')

            <span class="ml-4 cor_mensagem"> * Campos Obrigatorios </span>

            <div class="card-body">


                <div class="container">
                    <form method="POST" action="{{ route('vinculos.store') }}">
                        @csrf
                        <input type="hidden" id="id_usuario_responsavel" name="id_usuario_responsavel" value="{{Auth::user()->id}}">
                        <div class="row mb-3">

                            <div class="col-4">
                                <label for="id_gestor" class="col-form-label">{{ __('Gestor Responsável') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>

                                <select id="id_gestor" class="form-control">
                                    @foreach($usuarios as $usuario)
                                        <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-4">
                                <label for="id_empresa" class="col-form-label">{{ __('Empresa') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>

                                <select id="id_empresa" class="form-control">
                                    @foreach($empresas as $empresa)
                                        <option value="{{$empresa->id}}">{{$empresa->name}}</option>
                                    @endforeach

                                </select>

                            </div>
                            <div class="col-3">
                                <label  class="col-form-label mt-3"></label>
                                <button type="submit" class="btn btn-block btn-success">
                                    {{ __('Vincular') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
