@extends('layouts.app')

@section('content')
    <h1>Criar Loja</h1>
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label >Nome Produto</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label >Descrição</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="form-group">
            <label >Conteúdo</label>
            <textarea  class="form-control" name="body" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label >Preço</label>
            <input type="text" name="price" class="form-control">
        </div>
        <div class="form-group">
            <label >Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>
        <div class="form-group">
            <label >Lojas</label>
            <select name="store" class="form-control">
                @foreach($stores as $s)
                    <option value="{{$s->id}}">{{$s->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit"  class="btn btn-success" >Enviar</button>
        </div>


    </form>
@endsection
