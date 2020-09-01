@extends('layouts.app')


@section('content')
    @include('layouts.alerts')
    <h1>Atualizar Produto</h1>

    <form action="{{route('products.update', ['product' => $products->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="form-group">
            <label>Nome Produto</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$products->name}}">

            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{$products->description}}">

            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Conteúdo</label>
            <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{$products->body}}</textarea>

            @error('body')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>


        <div class="form-group">
            <label>Preço</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$products->price}}">
            @error('price')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Categorias</label>
            <select name="categories[]" class="form-control" multiple>
                @foreach($categories as $category)

                <option value="{{$category->id}}"
                    @if($products->categories->contains($category)) selected @endif
                >
                    {{$category->name}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
                <label>Fotos do produto</label>
                <input type="file" name="photos[]"class="form-control @error('photos.*') is-invalid @enderror" multiple>
            @error('photos.*') <div class="invalid-feedback">
                {{$message}}
            </div> @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-lg btn-success">Atualizar Produto</button>
        </div>
    </form>

    <hr>

    <div class="row text-center">
        @foreach($products->photos as $photo)
            <div class="container" style="width: 350px; padding-left: 10px">
            <img src="{{asset('storage/'. $photo->image)}}" alt="" class="img-fluid">
            <form action="{{route('photo.remove')}}" method="post">
                @csrf
                <input type="hidden" name="photoName" value="{{$photo->image}}">
                <button type="submit" class=" btn btn-lg btn-danger">Remover</button>
            </form>
            </div>
        @endforeach
    </div>
    <hr>
@endsection
