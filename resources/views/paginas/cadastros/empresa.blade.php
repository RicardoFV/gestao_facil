@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card mt-1">
            <div class="card-header">
                <h1>Empresa</h1>
            </div>
            <div class="form-row col-sm-12 justify-content-center">
                <div class="form-group col-sm-6 d-flex inline mt-3">
                    <a href="{{ route('empresas.index') }}" class="btn btn-block btn-primary">Ver Registro</a>
                </div>
            </div>

            <hr />
            <!-- colocando a mensagem de erro -->
            @include('mensagens.erro_cadastro')

            <span class="ml-4 cor_mensagem"> * Campos Obrigatorios </span>

            <div class="card-body">


                <div class="container">
                    <form method="POST" action="{{ route('empresas.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                <label for="nome" class="col-form-label">{{ __('Nome') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>

                                <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}">
                            </div>
                            <div class="col-4">
                                <label for="cnpj" class="col-form-label">{{ __('CNPJ') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>

                                <input id="cnpj" type="text" class="form-control" name="cnpj" value="{{ old('cnpj') }}">

                            </div>
                            <div class="col-2">
                                <label for="situacao_empresa" class="col-form-label">{{ __('Situação') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>
                                <select id="situacao_empresa" class="form-control">
                                    <option value="ativo">Ativo</option>
                                    <option value="inativo">Inativo</option>
                                </select>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <label for="email" class="col-form-label">{{ __('E-mail') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ old('email') }}">
                            </div>
                            <div class="col-3">
                                <label for="telefone_1" class="col-form-label">{{ __('Telefone 1') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>
                                <input id="telefone_1" type="tel" class="form-control" name="telefone_1"
                                    value="{{ old('telefone_1') }}">
                            </div>
                            <div class="col-3">
                                <label for="telefone_2" class="col-form-label">{{ __('Telefone 2') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>
                                <input id="telefone_2" type="tel" class="form-control" name="telefone_2"
                                    value="{{ old('telefone_2') }}">
                            </div>
                        </div>

                        <div class="row inline-flex">

                            <div class="col-1">
                                <label for="id_endereco" class="col-form-label">{{ __('Endereço') }}<span
                                        class="ml-1 cor_mensagem">*</span></label>

                                <input type="text" class="form-control">
                            </div>
                            <div class="col-auto my-3">
                                <label></label>
                                <input type="text" class="form-control mt-2">

                            </div>
                            <div class="col-auto my-4 pt-2">
                                <!-- Botão para acionar modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalExemplo">
                                    Abrir modal de demonstração
                                </button>
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








<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- criação da tabela  -->
                <div class="container">
                    <table class="table table-hover table-sm">
                        <thead class="text-center">
                            <tr>

                                <th scope="col">Cep</th>
                                <th scope="col">Bairro</th>
                                <th scope="col">Uf</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($enderecos as $endereco)

                                <tr>

                                    <td>{{ $endereco->cep }}</td>
                                    <td>{{ $endereco->bairro }}</td>
                                    <td>{{ $endereco->uf }}</td>
                                    <td>

                                        <a href="{{ action('EnderecoController@edit', $endereco->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>

                                        <a href="{{ action('EnderecoController@show', $endereco->id) }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="far fa-trash-alt"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="align-items-center">
                        {{ $enderecos->links() }}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar mudanças</button>
            </div>
        </div>
    </div>
</div>
