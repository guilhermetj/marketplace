@extends('layouts.app')

@section('content')
    @include('layouts.alerts')
    <a href="{{ route('products.create') }}" class="btn btn-success">Cadastrar</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Loja</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $p)
            <tr>
                <th>{{$p->id}}</th>
                <th>{{$p->name}}</th>
                <th>{{$p->store->name}}</th>
                <th>R$ {{ number_format($p->price, 2, ',','.') }}</th>
                <th>
                    <div class="btn-group">
                        <a href="{{ route('products.edit', $p->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('products.destroy', $p->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" >Remover</button>
                        </form>
                    </div>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$products->links()}}
@endsection
