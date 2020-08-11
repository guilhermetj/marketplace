@extends('layouts.app')

@section('content')
    @include('layouts.alerts')
    @if(!$store)
        <a href="{{ route('stores.create') }}" class="btn btn-success">Cadastrar</a>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Loja</th>
            <th>Total de produtos</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$store->id}}</td>
                <td>{{$store->name}}</td>
                <td>{{$store->products->count()}}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('stores.edit', $store->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('stores.destroy', $store->id) }}" metdod="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" >Remover</button>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
