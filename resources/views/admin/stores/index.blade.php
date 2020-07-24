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
                    <a href="{{ route('stores.edit', $store->id) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ route('stores.destroy', $store->id) }}" class="btn btn-danger">Deletar</a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$stores->links()}}
@endsection
