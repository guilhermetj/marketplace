<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<style>
#conteudo{
    margin-top: 40px;
}
</style>
        @auth
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="nav" >
            <a class="navbar-brand" href="{{route('home')}}">Marketplace</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item @if(request()->is('admin/stores*')) active @endif">
                    <a class="nav-link" href="{{route('stores.index')}}">Lojas <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item @if(request()->is('admin/products*')) active @endif">
                    <a class="nav-link" href="{{route('products.index')}}">Produtos</a>
                </li>
                <li class="nav-item @if(request()->is('admin/categories*')) active @endif">
                    <a class="nav-link" href="{{route('categories.index')}}">Categorias</a>
                </li>
                </ul>
                <div class="my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="" class="nav-link">{{auth()->user()->name}}</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" onclick="event.preventDefault(); 
                                                    document.querySelector('form.logout').submit();" href="#">Sair</a>
                        <form action="{{route('logout')}}" class="logout" method="post" style="display:none;">
                        @csrf
                        </form>
                    </li>
                    </ul>
                </div>
            </div>
            </nav>
        @endauth
    <div class="container" id="conteudo">
        @yield('content')
    </div>
</body>
</html>
