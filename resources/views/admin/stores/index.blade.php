@extends('layouts.app')

@section('content')
    @include('layouts.alerts')
    <a href="{{ route('stores.create') }}" class="btn btn-success">Cadastrar</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Loja</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stores as $store)
            <tr>
                <th>{{$store->id}}</th>
                <th>{{$store->name}}</th>
                <th>
                    <div class="btn-group">
                        <a href="{{ route('stores.edit', $store->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('stores.destroy', $store->id) }}" method="post">
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
    {{$stores->links()}}
@endsection
