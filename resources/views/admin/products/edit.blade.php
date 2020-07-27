@extends('layouts.app')

@section('content')
    <h1>Criar Loja</h1>
    <form action="{{ route('products.update', $products->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label >Nome Produto</label>
            <input type="text" name="name" class="form-control" value="{{$products->name}}">
        </div>
        <div class="form-group">
            <label >Descrição</label>
            <input type="text" name="description" class="form-control" value="{{$products->description}}">
        </div>
        <div class="form-group">
            <label >Conteúdo</label>
            <textarea  class="form-control" name="body" id="" cols="30" rows="10">{{$products->body}}</textarea>
        </div>
        <div class="form-group">
            <label >Preço</label>
            <input type="text" name="price" class="form-control" value="{{$products->price}}">
        </div>
        <div class="form-group">
            <label >Slug</label>
            <input type="text" name="slug" class="form-control" value="{{$products->slug}}">
        </div>
        <div class="form-group">
            <button type="submit"  class="btn btn-success" >Enviar</button>
        </div>


    </form>
@endsection
