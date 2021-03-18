@extends('layouts.app')
@section('content')


<div class="container">


    <div class="card mt-1">
        <div class="card-header">
            <h1>Configurações Da Aplicação</h1>
        </div>
        
        <div class="card-body">

            <div class="row mt-5">
                <div class="col-6">
                    <h1>
                        <a href="{{route('requirements.index') }}" class="badge badge-light">Requisito</a>
                    </h1>
                </div>
                <div class="col-6">
                    <h1>
                        <a href="{{route('systems.index') }}" class="badge badge-light">Sistema</a>
                    </h1>
                </div>    
        
                <div class="col-6">
                    <h1>
                        <a href="{{route('treatments.index') }}" class="badge badge-light">Tratamento</a>
                    </h1>
                </div>
                <div class="col-6">
                    <h1>
                        <a href="{{ route('register') }}" class="badge badge-light">Usuário</a>
                    </h1>
                </div>
        
                <div class="col-6">
                    <h1>
                        <a href="{{route('versions.index') }}" class="badge badge-light">Versão</a>
                    </h1>
                </div>
        
            
            </div>
        
           
        </div>
    </div>






    
</div>


@endsection
