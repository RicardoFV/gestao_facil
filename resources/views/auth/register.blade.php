@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-1">
        <div class="card-header">
            <h1>Usuário</h1>

        </div>
        <div class="form-row col-sm-12">
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <input type="text" class="form-control col-sm-4 mr-1 ml-2" placeholder="Digite seu nome" />
                <button type="submit" class="btn btn-primary col-4 btn-sm mr-1">Consultor</button>
            </div>
            <div class="form-group col-sm-6 d-flex inline mt-3">
                <button class="btn btn-primary col-sm-4 btn-sm mr-1">Novo</button>
                <button type="submit" class="btn btn-danger col-4 btn-sm mr-1">Deletar</button>
            </div>
        </div>

        <hr />

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                    <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Id') }}</label>

                    <div class="col-md-6">
                        <input id="id" type="text" class="form-control" readonly/>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="perfil_acesso" class="col-md-4 col-form-label text-md-right">{{ __('Perfil Acesso') }}</label>

                    <div class="col-md-6">
                        
                        <select id="perfil_acesso" name="perfil_acesso" class="form-control">
                            <option value="administrador" >Administrador(a)</option> 
                            <option value="desenvolvedor" >Desenvoldor(a)</option> 
                            <option value="usuario" >Usuário(a)</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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

        <!-- criação da tabela  -->
        <div class="container">
            <table class="table table-hover table-sm">
                <thead class="text-center">
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Perfil</th>
                        <th scope="col">Dt Inclusão</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
</div>
<br><br>



@endsection
