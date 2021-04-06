<div class="container">
    <!-- mensagem de sucesso-->
    @if (session('mensagem'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ session('mensagem') }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>
