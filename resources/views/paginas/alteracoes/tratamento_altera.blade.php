@extends('layouts.app')

@section('content')

<div class="container cadastro">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Tratamento</h1>
        </div>
        <div class="form-row col-sm-12 justify-content-center">
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{ route('treatments.create')}}" class="btn btn-block btn-primary">Novo Registro</a>
            </div>
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{route('treatments.index')}}" class="btn btn-block btn-primary">Ver Registro</a>
            </div>
        </div>

        <hr />

        <div class="card-body">

            <form method="POST" action="">
                @csrf

                <div class="form-group row">
                    <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Id') }}</label>

                    <div class="col-md-6">
                        <input id="id" type="text" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="id_sistema" class="col-md-4 col-form-label text-md-right">{{ __('Sistema') }}</label>

                    <div class="col-md-6">
                        <select name="id_sistema" id="id_sistema" class="form-control">
                            <option value="">Sistema 1</option>
                        </select>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="id_requisito" class="col-md-4 col-form-label text-md-right">{{ __('Requisito') }}</label>

                    <div class="col-md-6">
                        
                        <select name="id_requisito" id="id_requisito" class="form-control">
                            <option value="">Requisito 1</option>
                            <option value="">Requisito 2</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="situacao" class="col-md-4 col-form-label text-md-right">{{ __('Situacao') }}</label>

                    <div class="col-md-6">
                        <select name="situacao" id="situacao" class="form-control">
                            <option value="nao_iniciado">Não Iniciada</option>
                            <option value="em_andamento">Em Andamento</option>
                            <option value="parado">Parado</option>
                            <option value="concluido">Concluído</option>
                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_usuario_responsavel" class="col-md-4 col-form-label text-md-right">{{ __('Usuário Responsável') }}</label>

                    <div class="col-md-6">
                        <select name="id_usuario_responsavel" id="id_sistema" class="form-control">
                            <option value="">usuario 1</option>
                        </select>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>

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
