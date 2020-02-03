<?php
    $srcImg = 'sem-foto.png';
if (!Auth::guest()) {
    if (Auth::user()->avatar){
        $srcImg = Auth::user()->avatar;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Veganices</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{asset('assets/css/template/style.css')}}">
    @yield('css')
    <script defer src="{{asset('assets/js/template/script.js')}}"></script>
</head>

<body>

    <header id="menuHeader" class="fixed-top">
        <div class="container-fluid">
            <div class="row flex-row-reverse flex-md-row">
                <div class="col-5 col-sm-4 col-md-2">
                    <a class="col" href="{{route('home.index')}}">
                        <img class="p-2 p-pq-1" height="60" src="{{asset('assets/img/template/logo.png')}}" alt="Logo">
                    </a>
                </div>
                <div class="col">
                    <nav class="navbar navbar-expand-md">
                        <div>
                            <button id="botaoMenu" class="navbar-toggler ml-n3" type="button" data-toggle="collapse"
                                data-target="#navBar" aria-controls="navBar" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <i id="iconeMenu" class="material-icons navItem">
                                    menu
                                </i>
                            </button>
                        </div>
                        <div id="navBar" class="nav collapse navbar-collapse justify-content-md-end">
                            <ul class="navbar-nav">
                                <a class="nav-link navItem text-light font-weight-bold mr-3"
                                    href="{{route('home.index')}}">Home &nbsp;<span
                                        class="d-none d-md-inline">|</span></a>
                                <a class="nav-link navItem text-light font-weight-bold mr-3"
                                    href="{{route('recipes.index')}}">Receitas &nbsp;<span
                                        class="d-none d-md-inline">|</span></a>
                                <a class="nav-link navItem text-light font-weight-bold"
                                    href="{{route('community.index')}}">Comunidade &nbsp;<span
                                        class="d-none d-md-inline">|</span></a>
                            </ul>
                        </div>
                    </nav>
                </div>
                @if (Auth::guest())
                <a class="nav-link navItem text-light font-weight-bold pt-3" href="{{route('login')}}">Acesse</a>
                <a class="nav-link navItem text-light font-weight-bold pt-3"
                    href="{{route('register')}}">Registre-se</a>
                @else
                <button class="btn btn-link" id="button-perfil" data-target="#modal-user" data-toggle="modal"
                    class="pt-3 px-4">
                    <img id="img-perfil" src="{{asset('media/img/'.$srcImg)}}" class="mr-2" alt="imagem perfil">
                    <span class="font-weight-bold navItem text-light">
                        {{Auth::user()->name}}
                    </span>
                </button>
                <a href="{{route('logout')}}" class="pt-3 px-4 text-light navItem font-weight-bold nav-link">Sair</a>
                @endif
            </div>
        </div>
    </header>
    @if(!Auth::guest())
    <div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="modal-user-label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div id="fundo-modal"
                        style="background-image:url('{{asset('assets/img/template/fundo-modal.jpg')}}')"
                        class="widget-user-header bg-aqua-active w-100">
                        <div id="div-user" class="d-flex justify-content-center mt-4">
                            <img id="img-user" class="img-thumbnail img-fluid" src="{{asset('media/img/'.$srcImg)}}"
                                width="128" alt="Foto do usuário">
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="pb-3">
                        <div class="pb-2">
                            Informações do perfil
                        </div>
                        <div>
                            Nome : {{Auth::user()->name}}<br>
                            E-mail : {{Auth::user()->email}}<br>
                        </div>
                    </div>
                    <div>
                        Endereços
                        <div class="pb-3">
                            ...
                        </div>
                        <button class="btn btn-info">Adicionar</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-warning">Editar</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    @yield('content')

    <footer id="rodape" class="text-light bg-dark">

        <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-md-2">
                    <a href="{{route('home.index')}}"><img class="mt-2" src="{{asset('assets/img/template/logo.png')}}"
                            height="50" alt="Logo Veganices"></a>
                </div>
                <div class="col-6 d-none d-md-flex">
                    <a class="nav-link text-light font-weight-bold py-4 px-sm-1 px-md-2 px-lg-3 px-xl-4 pl-full-5 pr-full-4"
                        href="{{route('recipes.index')}}">Receitas</a>
                    <a class="nav-link text-light font-weight-bold py-4 px-sm-1 px-md-2 px-lg-3 px-xl-4 pl-full-5 pr-full-4"
                        href={{route('community.index')}}>Comunidade</a>
                </div>
                <div class="col-6 col-md-4">
                    <h6 class="font-weight-bold pl-4 pt-2">Redes Sociais</h6>
                    <a target="_blank" href="https://facebook.com"><img height="40" class="mr-3 mt-3"
                            src="{{asset('assets/img/template/facebook.png')}}" alt="Logo Facebook"></a>
                    <a target="_blank" href="https://instagram.com"><img height="40" class="mr-3 mt-3"
                            src="{{asset('assets/img/template/instagram.png')}}" alt="Logo Instagram"></a>
                    <a target="_blank" href="https://twitter.com"><img height="40" class="mr-3 mt-3"
                            src="{{asset('assets/img/template/twitter.png')}}" alt="Logo Twitter"></a>
                </div>
            </div>
            <div class="col-12">
                <h6 class="py-2 font-weight-bold m-0">@Copyright 2019 BeeVegan</h6>
            </div>
        </div>

    </footer>

    @yield('js')
</body>

</html>
