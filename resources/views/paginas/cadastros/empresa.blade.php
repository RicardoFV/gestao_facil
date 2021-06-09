@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card mt-1">
            <div class="card-header">
                <h1>Empresa</h1>
            </div>
            <div class="form-row col-sm-12 justify-content-center">
                <div class="form-group col-sm-6 d-flex inline mt-3">
                    <a href="{{ route('companies.index') }}" class="btn btn-block btn-primary">Ver Registro</a>
                </div>
            </div>

            <hr />
            <!-- colocando a mensagem de erro -->
            @include('mensagens.erro_cadastro')

            <span class="ml-4 cor_mensagem"> * Campos Obrigatorios </span>

            <div class="card-body">


                <div class="container">
                    <form method="POST" action="{{ route('companies.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">


                                <div class="form-group row">
                                    <label for="nome" class="col-form-label">{{ __('Nome') }}<span
                                            class="ml-1 cor_mensagem">*</span></label>

                                    <div class="col">
                                        <input id="nome" type="text" class="form-control" name="nome"
                                            value="{{ old('nome') }}">
                                    </div>
                                    <label for="id_usuario_gestor" class="col-form-label">{{ __('G. Resp.') }}<span
                                            class="ml-1 cor_mensagem">*</span></label>

                                    <div class="col-md-3">
                                        <select id="id_usuario_gestor" class="form-control">
                                            <option value="ativo">responsavel</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="telefone_1" class="col-form-label">{{ __('Telefone 1') }}<span
                                            class="ml-1 cor_mensagem">*</span></label>

                                    <div class="col">
                                        <input id="telefone_1" type="tel" class="form-control" name="telefone_1"
                                            value="{{ old('telefone_1') }}">
                                    </div>

                                    <label for="telefone_2" class="col-form-label">{{ __('Telefone 2') }}<span
                                            class="ml-1 cor_mensagem">*</span></label>

                                    <div class="col">
                                        <input id="telefone_2" type="tel" class="form-control" name="telefone_2"
                                            value="{{ old('telefone_2') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="email" class="col-form-label">{{ __('E-mail') }}<span
                                            class="ml-1 cor_mensagem">*</span></label>

                                    <div class="col">
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ old('email') }}">
                                    </div>
                                    <label for="situacao_empresa" class="col-form-label">{{ __('Situação') }}<span
                                            class="ml-1 cor_mensagem">*</span></label>

                                    <div class="col-md-3">
                                        <select id="situacao_empresa" class="form-control">
                                            <option value="ativo">Ativo</option>
                                            <option value="inativo">tivo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cnpj" class="col-form-label">{{ __('CNPJ') }}<span
                                            class="ml-1 cor_mensagem">*</span></label>

                                    <div class="col">
                                        <input id="cnpj" type="text" class="form-control" name="cnpj"
                                            value="{{ old('cnpj') }}">
                                    </div>
                                    <label for="id_endereco" class="col-form-label">{{ __('Endereço') }}<span
                                            class="ml-1 cor_mensagem">*</span></label>

                                    <div class="col">
                                        <select id="id_endereco" class="form-control">
                                            <option value="ativo">endereço</option>

                                        </select>
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
    </div>

@endsection
