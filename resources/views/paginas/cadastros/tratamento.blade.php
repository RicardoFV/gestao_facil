@extends('layouts.app')

@section('content')

<div class="container cadastro">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Tratamento</h1>
        </div>
        <div class="form-row col-sm-12 justify-content-center">
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <a href="{{route('treatments.index')}}" class="btn btn-block btn-primary">Ver Registro</a>
            </div>
        </div>

        <hr />
        <!-- colocando a mensagem de erro -->
        @include('mensagens.erro_cadastro')

        <div class="card-body">

            <form method="POST" action="{{route('treatments.store')}}">
                @csrf

                <div class="container">
                    <div class="row">
                      <div class="col-sm-4">
                       
                        
                        <div class="form-group">
                            <label for="dt_entrega" class="col-md-12 col-form-label">{{ __('Data De Entrega') }}</label>

                            <div class="col-md-12">
                                <input id="dt_entrega" name="dt_entrega" type="date" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_sistema" class="col-md-12 col-form-label ">{{ __('Sistema') }}</label>
        
                            <div class="col-md-12">
                                <select name="id_sistema" id="id_sistema" class="form-control">
                                    @foreach($sistemas as $sistema)
                                        <option value="{{$sistema->id_sistema}}">{{$sistema->nome_sistema}}</option>
                                    @endforeach
                                </select>
        
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_requisito" class="col-md-12 col-form-label">{{ __('Requisito') }}</label>
        
                            <div class="col-md-12">
                                
                                <select name="id_requisito" id="id_requisito" class="form-control">
                                    @foreach($requisitos as $requisito)
                                        <option value="{{$requisito->id}}">{{$requisito->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label for="situacao" class="col-md-12 col-form-label">{{ __('Situacao') }}</label>
        
                            <div class="col-md-12">
                                <select name="situacao" id="situacao" class="form-control">
                                    <option value="novo">Novo</option>
                                    <option value="nao_iniciado">Não Iniciada</option>
                                    <option value="em_andamento">Em Andamento</option>
                                    <option value="parado">Parado</option>
                                    <option value="concluido">Concluído</option>
                                </select>
        
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_usuario_responsavel" class="col-md-12 col-form-label">{{ __('Usuário Responsável') }}</label>
        
                            <div class="col-md-12">
                                <select name="id_usuario_responsavel" id="id_sistema" class="form-control">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ ($user->id == Auth::user()->id)? 'selected': ''}}>{{$user->name}}</option>
                                    @endforeach
                                </select>
        
                            </div>
                        </div>

                      </div>
                      <div class="col-sm-8">
                        
                        <div class="form-group">
                            <label for="descricao" class="col-md-4 col-form-label">{{ __('Descrição') }}</label>
        
                            <div class="col-md-12">
                                <textarea name="descricao" placeholder="Digite a descrição" class="form-control" id="descricao" cols="35" rows="4"></textarea>
                            </div>
                        </div>

                      </div>
                    
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
