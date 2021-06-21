@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card mt-1">
            <div class="card-header">
                <h1>Empresa</h1>
            </div>
            <div class="form-row col-sm-12 justify-content-center">
                <div class="form-group col-sm-6 d-flex inline mt-3">
                    <a href="{{route('empresas.create')}}" class="btn btn-block btn-primary">Novo Registro</a>
                </div>
                <div class="form-group col-sm-6 d-flex inline mt-3">
                    <a href="{{route('empresas.index')}}" class="btn btn-block btn-primary">Ver Registro</a>
                </div>
            </div>

            <hr />
            <!-- colocando a mensagem de erro -->
            @include('mensagens.erro_cadastro')

            <span class="ml-4 cor_mensagem"> * Campos Obrigatorios </span>

            <div class="card-body">


                <div class="container">
                    <form method="POST" action="{{ route('empresas.update', $empresa->id) }}">
                        @csrf
                        @method('PUT')

                        <input type="hidden" id="id_usuario" name="id_usuario" value="{{Auth::user()->id}}">

                        <div class="row">
                            <div class="col-6">
                                <label for="name" class="col-form-label">{{ __('Nome') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>

                                <input id="name" type="text" class="form-control" name="name" value="{{$empresa->name}}">
                            </div>
                            <div class="col-4">
                                <label for="cnpj" class="col-form-label">{{ __('CNPJ') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>

                                <input id="cnpj" maxlength="18" onkeydown="mascaraCnpj()" type="text" class="form-control" name="cnpj" value="{{$empresa->cnpj}}">

                            </div>
                            <div class="col-2">
                                <label for="situacao_empresa" class="col-form-label">{{ __('Situação') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>
                                <select id="situacao_empresa" name="situacao_empresa" class="form-control">
                                    <option value="ativo" {{ ($empresa->situacao_empresa == 'ativo')? 'selected': ''}}>Ativo</option>
                                    <option value="inativo" {{ ($empresa->situacao_empresa == 'inativo')? 'selected': ''}}>Inativo</option>
                                </select>
                            </div>
                        </div>
                        <fieldset>
                            <legend>Endereço</legend>
                            <div class="row">

                                <div class="col-3">
                                    <label for="cep" class="col-form-label">{{ __('Cep') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>
                                    <input type="text" value="{{$empresa->cep}}" maxlength="9" onchange="consultarCep()" class="form-control" name="cep" id="cep" placeholder="Digite seu Cep">
                                </div>

                                <div class="col-3">
                                    <label for="logradouro" class="col-form-label">{{ __('Logradouro') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>
                                    <input type="text" value="{{$empresa->logradouro}}" class="form-control" id="logradouro" name="logradouro" >
                                </div>
                                <div class="col-2">
                                    <label for="localidade" class="col-form-label">{{ __('Localidade') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>
                                    <input type="text" value="{{$empresa->localidade}}"  class="form-control" id="localidade" name="localidade" >
                                </div>

                                <div class="col-2">
                                    <label for="complemento" class="col-form-label">{{ __('Complemento') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>
                                    <input type="text" value="{{$empresa->complemento}}" class="form-control" name="complemento" id="complemento" >
                                </div>
                                <div class="col-2">
                                    <label for="uf" class="col-form-label">{{ __('Uf') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>
                                    <input type="text" value="{{$empresa->uf}}" class="form-control" name="uf" id="uf" >
                                </div>

                                <div class="col-5">
                                    <label for="bairro" class="col-form-label">{{ __('Bairro') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>
                                    <input type="text" value="{{$empresa->bairro}}" class="form-control" name="bairro" id="bairro">
                                </div>

                            </div>

                        </fieldset>

                        <div class="row">
                            <div class="col-6">
                                <label for="email" class="col-form-label">{{ __('E-mail') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>
                                <input id="email" type="email" class="form-control" name="email" value="{{$empresa->email}}">
                            </div>
                            <div class="col-3">
                                <label for="telefone_1" class="col-form-label">{{ __('Telefone 1') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>
                                <input id="telefone_1" onBlur="mascaraTelefone1()" maxlength="12" type="text" class="form-control" name="telefone_1"value="{{$empresa->telefone_1}}">
                            </div>
                            <div class="col-3">
                                <label for="telefone_2" class="col-form-label">{{ __('Telefone 2') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>
                                <input id="telefone_2" type="text" maxlength="12" onBlur="mascaraTelefone2()" class="form-control" name="telefone_2"value="{{$empresa->telefone_2}}">
                            </div>
                        </div>


                        <div class="row mb-3 mt-4">

                            <div class="col">
                                <div class="col-md-6 offset-md-3">
                                    <button type="submit" class="btn btn-block btn-success">
                                        {{ __('Atualizar') }}
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








