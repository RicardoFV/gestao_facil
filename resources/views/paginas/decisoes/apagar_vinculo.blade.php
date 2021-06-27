@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-1">

        <div class="card-body">

            <h1 class="text-center">Tem certeza que deseja remover o vinculo com essa Empresa  ?</h1>
            <p class="text-center mt-2">
                <strong>
                    {{$empresa->name}}
                </strong>
            </p>
            <div class="form-row col-sm-12 justify-content-center">
                <div class="form-group col-sm-6 d-flex inline mt-3 justify-content-sm-end">

                    <form method="post" action="{{route('vinculos.destroy',$vinculo->id )}}">
                            @csrf
                            <!-- colocando o segundo metodo para ser executad -->
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                <!-- ou inves do nome excluir , coloco um icone -->
                                    Sim
                                </button>
                    </form>

                </div>
                <div class="form-group col-sm-6 d-flex inline mt-3 justify-content-sm-start">
                    <a href="{{route('vinculos.index')}}" class="btn btn-primary btn-sm">Não</a>
                </div>
            </div>

        </div>

    </div>
</div>


@endsection
