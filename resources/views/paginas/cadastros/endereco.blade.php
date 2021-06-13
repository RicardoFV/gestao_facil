@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card mt-1">
            <div class="card-header">
                <h1>Endereço</h1>
            </div>
            <div class="form-row col-sm-12 justify-content-center">
                <div class="form-group col-sm-6 d-flex inline mt-3">
                    <a href="{{ route('enderecos.index') }}" class="btn btn-block btn-primary">Ver Registro</a>
                </div>
            </div>

            <hr />
            <!-- colocando a mensagem de erro -->
            @include('mensagens.erro_cadastro')

            <span class="ml-4 cor_mensagem"> * Campos Obrigatorios </span>

            <div class="card-body">


                <div class="container">
                    <form method="POST" action="{{ route('enderecos.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-3">
                                <label for="meu_cep" class="col-form-label">{{ __('Cep') }}<span
                                    class="ml-1 cor_mensagem">*</span></label>
                                <input type="text" class="form-control" id="meu_cep" placeholder="Digite seu Cep">
                            </div>
                        </div>

                        <hr>
                        <div class="row offset-md-2">

                            <div class="col-3">
                                <label for="cep" class="col-form-label">{{ __('Cep') }}</label>
                                <input type="text" class="form-control" name="cep" id="cep" disabled="disabled">
                            </div>

                            <div class="col-3">
                                <label for="logradouro" class="col-form-label">{{ __('Logradouro') }}</label>
                                <input type="text" class="form-control" id="logradouro" name="logradouro" disabled="disabled">
                            </div>

                            <div class="col-3">
                                <label for="complemento" class="col-form-label">{{ __('Complemento') }}</label>
                                <input type="text" class="form-control" name="complemento" id="complemento" disabled="disabled">
                            </div>
                        </div>

                        <div class="row offset-md-2">

                            <div class="col-3">
                                <label for="bairro" class="col-form-label">{{ __('Bairro') }}</label>
                                <input type="text" class="form-control" name="bairro" id="bairro" disabled="disabled">
                            </div>

                            <div class="col-3">
                                <label for="localidade" class="col-form-label">{{ __('Localidade') }}</label>
                                <input type="text" class="form-control" id="localidade" name="localidade" disabled="disabled">
                            </div>

                            <div class="col-3">
                                <label for="uf" class="col-form-label">{{ __('Uf') }}</label>
                                <input type="text" class="form-control" name="uf" id="uf" disabled="disabled">
                            </div>
                        </div>


                        <div class="row mb-3 mt-4">

                            <div class="col">
                                <div class="col-md-6 offset-md-3">
                                    <button type="submit" class="btn btn-block btn-success">
                                        {{ __('Cadastrar') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
