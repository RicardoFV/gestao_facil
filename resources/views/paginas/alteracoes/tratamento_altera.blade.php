@extends('layouts.app')

@section('content')

    <div class="container cadastro">
        <div class="card mt-1">
            <div class="card-header">
                <h1>Chamado</h1>
            </div>
            <div class="form-row col-sm-12 justify-content-center">
                <div class="form-group col-sm-6 d-flex inline mt-3">
                    <a href="{{ route('chamados.create') }}" class="btn btn-block btn-primary">Novo Registro</a>
                </div>
                <div class="form-group col-sm-6 d-flex inline mt-3">
                    <a href="{{ route('chamados.index') }}" class="btn btn-block btn-primary">Ver Registro</a>
                </div>
            </div>

            <hr />
            <!-- colocando a mensagem de erro -->
            @include('mensagens.erro_cadastro')
            <span class="ml-4 cor_mensagem"> * Campos Obrigatorios </span>

            <div class="card-body">

                <form method="POST" action="{{ route('chamados.update', $tratamento->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">

                                <div class="form-group ">
                                    <label for="id" class="col-md-12 col-form-label">{{ __('Id') }}</label>

                                    <div class="col-md-12">
                                        <input id="id" type="text" value="{{ $tratamento->id }}" class="form-control"
                                            readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="dt_entrega"
                                           class="col-md-12 col-form-label">{{ __('Empresa') }} <span class="ml-1 cor_mensagem">*</span></label>

                                    <div class="col-md-12">
                                        <input id="id_empresa" type="hidden" class="form-control" name="id_empresa" value="{{$empresa->id}}">
                                        <input id="empresa_nome" type="text" class="form-control" name="empresa_nome" value="{{$empresa->name}}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="dt_entrega"
                                        class="col-md-12 col-form-label">{{ __('Data De Entrega') }} <span class="ml-1 cor_mensagem">*</span></label>

                                    <div class="col-md-12">
                                        <input id="dt_entrega" value="{{ $tratamento->dt_entrega }}" name="dt_entrega"
                                               type="date" class="form-control">
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label for="id_sistema" class="col-md-12 col-form-label ">{{ __('Sistema') }} <span
                                            class="ml-1 cor_mensagem">*</span></label>

                                    <div class="col-md-12">
                                        <input id="id_sistema" type="hidden" class="form-control" name="id_sistema"
                                               value="{{$sistema->id}}">
                                        <input id="nome_sistema" type="text" value="{{ $sistema->nome }}"
                                               class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="id_requisito"
                                           class="col-md-12 col-form-label">{{ __('Requisito') }} <span
                                            class="ml-1 cor_mensagem">*</span></label>

                                    <div class="col-md-12">
                                        <input id="id_requisito" type="hidden" class="form-control" name="id_requisito"
                                               value="{{$requisito->id}}">
                                        <input id="nome_requisito" type="text" value="{{ $requisito->nome }}"
                                               class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="situacao" class="col-md-12 col-form-label">{{ __('Situacao') }} <span
                                            class="ml-1 cor_mensagem">*</span></label>

                                    <div class="col-md-12">
                                        <select name="situacao" id="situacao" class="form-control">
                                            <option
                                                value="novo" {{ $tratamento->situacao == 'novo' ? 'selected' : '' }}>
                                                Novo
                                            </option>
                                            <option value="nao_iniciado"
                                                {{ $tratamento->situacao == 'nao_iniciado' ? 'selected' : '' }}>Não
                                                Iniciada</option>
                                            <option value="em_andamento"
                                                {{ $tratamento->situacao == 'em_andamento' ? 'selected' : '' }}>Em
                                                Andamento</option>
                                            <option value="parado"
                                                {{ $tratamento->situacao == 'parado' ? 'selected' : '' }}>Parado</option>
                                            <option value="concluido"
                                                {{ $tratamento->situacao == 'concluido' ? 'selected' : '' }}>Concluído
                                            </option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_usuario_responsavel"
                                           class="col-md-10 col-form-label">{{ __('Usuário Responsável') }} <span
                                            class="ml-1 cor_mensagem">*</span></label>

                                    <div class="col-md-12">

                                        <input id="id_usuario_responsavel" type="hidden" class="form-control"
                                               name="id_usuario_responsavel" value="{{$user->id}}">
                                        <input id="nome_usuario" type="text" value="{{ $user->name }}"
                                               class="form-control" readonly>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-8">

                                <div class="form-group ">
                                    <label for="descricao" class="col-md-4 col-form-label ">{{ __('Descrição') }} <span class="ml-1 cor_mensagem">*</span></label>

                                    <div class="col-md-12">
                                        <textarea name="descricao" placeholder="Digite a descrição" class="form-control"
                                            id="descricao" cols="35" rows="4">
                                              {{ $tratamento->descricao }}
                                          </textarea>
                                    </div>
                                </div>
                                <h6 class="text-center">Descrições Anteriores</h6>
                                <hr />

                                @foreach ($descricoes as $descricao)

                                    <p class="text-right mr-3">
                                        {{ $descricao->created_at }}
                                    </p>
                                    <p class="ml-4">
                                        {{ $descricao->descricao }}
                                    </p>
                                    <hr>
                                @endforeach


                            </div>
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
