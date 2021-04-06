@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- mensagem de Sucesso-->
        @include('mensagens.sucesso')

        <!-- mensagem de erro-->
        @include('mensagens.erro')
        <h1 class="text-center">Tratamentos</h1>

        @if ($concluido > 0)
            <div class="card text-center mb-5 mt-3">
                <div class="card-body">
                    <h5 class="card-title">Concluído</h5>
                    <h1 class="text-center">{{ $concluido }}</h1>
                    <a href="{{ route('ver_tratamento', 'concluido') }}" class="btn btn-primary btn-block">Visitar</a>
                </div>
            </div>
        @endif


        <div class="row">
            @if ($novo > 0)
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Novo</h5>
                            <h1 class="text-center">{{ $novo }}</h1>
                            <a href="{{ route('ver_tratamento', 'novo') }}" class="btn btn-primary btn-block">Visitar</a>
                        </div>
                    </div>
                </div>
            @endif
            @if ($nao_iniciado > 0)
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Não Inciado</h5>
                            <h1 class="text-center">{{ $nao_iniciado }}</h1>
                            <a href="{{ route('ver_tratamento', 'nao_iniciado') }}"
                                class="btn btn-primary btn-block">Visitar</a>
                        </div>
                    </div>
                </div>
            @endif
            @if ($andamento > 0)
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Andamento</h5>
                            <h1 class="text-center">{{ $andamento }}</h1>
                            <a href="{{ route('ver_tratamento', 'em_andamento') }}"
                                class="btn btn-primary btn-block">Visitar</a>
                        </div>
                    </div>
                </div>
            @endif
            @if ($parado > 0)
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Parado</h5>
                            <h1 class="text-center">{{ $parado }}</h1>
                            <a href="{{ route('ver_tratamento', 'parado') }}"
                                class="btn btn-primary btn-block">Visitar</a>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
