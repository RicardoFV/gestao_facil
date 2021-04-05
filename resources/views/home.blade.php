@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Tratamentos</h1>


        <div class="card text-center mb-5 mt-3">
            <div class="card-body">
                <h5 class="card-title">Concluído</h5>
                <h1 class="text-center">{{$concluido}}</h1>
                <a href="#" class="btn btn-primary btn-block">Visitar</a>
            </div>
        </div>



        <div class="row">

            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Novo</h5>
                        <h1 class="text-center">{{$novo}}</h1>
                        <a href="#" class="btn btn-primary btn-block">Visitar</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Não Inciado</h5>
                        <h1 class="text-center">{{$nao_iniciado}}</h1>
                        <a href="#" class="btn btn-primary btn-block">Visitar</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Andamento</h5>
                        <h1 class="text-center">{{$andamento}}</h1>
                        <a href="#" class="btn btn-primary btn-block">Visitar</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Parado</h5>
                        <h1 class="text-center">{{$parado}}</h1>
                        <a href="#" class="btn btn-primary btn-block">Visitar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
