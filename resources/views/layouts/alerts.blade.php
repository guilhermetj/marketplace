{{-- mensagem de alerta --}}
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
{{-- fim de mensagem --}}
