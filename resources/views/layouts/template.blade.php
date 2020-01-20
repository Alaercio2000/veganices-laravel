<!DOCTYPE html>
<html lang="pt-br">

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="css/css-bootstrap/coresBootstrap.min.css">
    <link rel="stylesheet" href="css/css-template/template.css">
<<<<<<< HEAD
    <link rel="stylesheet" href="{{asset('css/css-item/coresBootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/css-item/search.css')}}">

=======
>>>>>>> cce72095586c192eb833608e5be4bc80a83f1a59
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<<<<<<< HEAD
    <script src="{{asset('js/js-template/headerGeral.js')}}"></script>
=======
    <script src="js/js-template/headerGeral.js"></script>
>>>>>>> cce72095586c192eb833608e5be4bc80a83f1a59

</head>

<body>

    <header class="fixed-top">
        <div id="menuHeader" class="container-fluid">
            <div class="row flex-row-reverse flex-md-row">
                <div class="col-6 col-pq-5 col-sm-8 col-md-2 pr-1">
<<<<<<< HEAD
                    <a class="col" href="{{route('homeUrl')}}">
                        <img class="p-2 p-pq-1" height="90" src="{{asset('img/img-header-menu/logo.png')}}" alt="Logo">
=======
                    <a class="col" href="/veganices/paginas/home/home.php">
                        <img class="p-2 p-pq-1" height="90" src="img/img-header-menu/logo.png" alt="Logo">
>>>>>>> cce72095586c192eb833608e5be4bc80a83f1a59
                    </a>
                </div>
                <div class="col">
                    <nav class="navbar navbar-expand-md">
                        <div>
                            <button id="botaoMenu" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBar" aria-controls="navBar" aria-expanded="false" aria-label="Toggle navigation">
                                <i id="iconeMenu" class="material-icons">
                                    menu
                                </i>
                            </button>
                        </div>
                        <div id="navBar" class="nav collapse navbar-collapse">
                            <ul class="navbar-nav mr-auto">
                                <a id="textMenu1" class="nav-link text-info font-weight-bold py-4 px-sm-1 px-md-2 px-lg-3 px-xl-4 pl-full-5 pr-full-4" href="#">Sobre</a>
                                <a id="textMenu2" class="nav-link text-info font-weight-bold py-4 px-sm-1 px-md-2 px-lg-3 px-xl-4 pl-full-5 pr-full-4" href="#">Restaurantes</a>
<<<<<<< HEAD
                                <a id="textMenu3" class="nav-link text-info font-weight-bold py-4 px-sm-1 px-md-2 px-lg-3 px-xl-4 pl-full-5 pr-full-4" href="{{route('recipesUrl')}}">Produtos</a>
=======
                                <a id="textMenu3" class="nav-link text-info font-weight-bold py-4 px-sm-1 px-md-2 px-lg-3 px-xl-4 pl-full-5 pr-full-4" href="#">Produtos</a>
>>>>>>> cce72095586c192eb833608e5be4bc80a83f1a59
                                <a id="textMenu4" class="nav-link text-info font-weight-bold py-4 px-sm-1 px-md-2 px-lg-3 px-xl-4 pl-full-5 pr-full-4" href="#">Profissionais</a>
                                <a id="textMenu5" class="nav-link text-info font-weight-bold py-4 px-sm-1 px-md-2 px-lg-3 px-xl-4 pl-full-5 pr-full-4" href="#">Blog</a>
                                <a id="textMenu6" class="nav-link text-info font-weight-bold py-4 px-sm-1 px-md-2 px-lg-3 px-xl-4 pl-full-5 pr-full-4" href="#">Comunidade</a>
                                <a id="textMenu7" class="nav-link text-info font-weight-bold py-4 px-sm-1 px-md-2 px-lg-3 px-xl-4 pl-full-5 pr-full-4" href="#">Acesse</a>
                                <a id="textMenu8" class="nav-link text-info font-weight-bold py-4 px-sm-1 px-md-2 px-lg-3 px-xl-4 pl-full-5 pr-full-4" href="#">Registre-se</a>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

<footer id="rodape" class="text-light bg-dark">

<div class="container-fluid">
    <div class="row">
        <div class="col-6 col-md-2">
<<<<<<< HEAD
            <a href="/veganices/paginas/home/home.php"><img class="mt-2" src="{{asset('img/img-header-menu/logo.png')}}" height="50" alt="Logo Veganices"></a>
=======
            <a href="/veganices/paginas/home/home.php"><img class="mt-2" src="img/img-header-menu/logo.png" height="50" alt="Logo Veganices"></a>
>>>>>>> cce72095586c192eb833608e5be4bc80a83f1a59
        </div>
        <div class="col-6 d-none d-md-flex">
            <a class="nav-link text-info font-weight-bold py-4 px-sm-1 px-md-2 px-lg-3 px-xl-4 pl-full-5 pr-full-4" href="/veganices/paginas/sobre/sobre.php">Sobre</a>
            <a class="nav-link text-info font-weight-bold py-4 px-sm-1 px-md-2 px-lg-3 px-xl-4 pl-full-5 pr-full-4" href="/veganices/paginas/search/search.php">Produtos</a>
            <a class="nav-link text-info font-weight-bold py-4 px-sm-1 px-md-2 px-lg-3 px-xl-4 pl-full-5 pr-full-4" href="/veganices/paginas/search/search.php">Profissionais</a>
            <a class="nav-link text-info font-weight-bold py-4 px-sm-1 px-md-2 px-lg-3 px-xl-4 pl-full-5 pr-full-4" href="/veganices/paginas/blog/blog.php">Blog</a>
            <a class="nav-link text-info font-weight-bold py-4 px-sm-1 px-md-2 px-lg-3 px-xl-4 pl-full-5 pr-full-4" href="/veganices/paginas/comunidade/comunidade.php">Comunidade</a>
        </div>
        <div class="col-6 col-md-4">
            <h6 class="font-weight-bold pl-4 pt-2">Redes Sociais</h6>
<<<<<<< HEAD
            <a target="_blank" href="https://facebook.com"><img height="40" class="mr-3 mt-3" src="{{asset('img/img-footer/facebook.png')}}"  alt="Logo Facebook"></a>
            <a target="_blank" href="https://instagram.com"><img height="40" class="mr-3 mt-3" src="{{asset('img/img-footer/instagram.png')}}" alt="Logo Instagram"></a>
            <a target="_blank" href="https://twitter.com"><img height="40" class="mr-3 mt-3" src="{{asset('img/img-footer/twitter.png ')}}"alt="Logo Twitter"></a>
=======
            <a target="_blank" href="https://facebook.com"><img height="40" class="mr-3 mt-3" src="img/img-footer/facebook.png" alt="Logo Facebook"></a>
            <a target="_blank" href="https://instagram.com"><img height="40" class="mr-3 mt-3" src="img/img-footer/instagram.png" alt="Logo Instagram"></a>
            <a target="_blank" href="https://twitter.com"><img height="40" class="mr-3 mt-3" src="img/img-footer/twitter.png" alt="Logo Twitter"></a>
>>>>>>> cce72095586c192eb833608e5be4bc80a83f1a59
        </div>
    </div>
    <div class="col-12">
        <h6 class="py-2 font-weight-bold m-0">@Copyright 2019 BeeVegan</h6>
    </div>
</div>

</footer>

</body>
</html>
