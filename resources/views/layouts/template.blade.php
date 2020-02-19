@if(!Auth::guest())
<?php $user = Auth::user()?>
<?php $address = $user->address()->first()?>
@if($user->provider)
<?php $provider = $user->provider()->first()?>
@endif
@endif
<!DOCTYPE html>
<html lang="pt-br">

<link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Veganices</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{asset('assets/css/template/style.css')}}">
    @yield('css')
    <script defer src="{{asset('assets/js/template/script.js')}}"></script>
</head>

<body @yield('body')>

    <header id="menuHeader" class="fixed-top">
        <div class="container-fluid">
            <div class="d-flex">
                <div class="{{(Auth::guest())?'col-7 col-sm-7':'col-6 col-sm-5'}} col-md-2 order-2 order-md-1">
                    <a href="{{route('home.index')}}">
                        <img height="60" src="{{asset('favicon.ico')}}" alt="Logo">
                    </a>
                </div>
                <div class="col order-1 order-md-2">
                    <nav class="navbar navbar-expand-md">
                        <div>
                            <button id="botaoMenu" class="navbar-toggler ml-n5 ml-xl-n3" type="button"
                                data-toggle="collapse" data-target="#navBar" aria-controls="navBar"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <i id="iconeMenu" class="material-icons navItem">
                                    menu
                                </i>
                            </button>
                        </div>
                        <div id="navBar" class="nav collapse navbar-collapse justify-content-md-end">
                            <ul class="navbar-nav">
                                <a class="nav-link navItem text-light font-weight-bold py-2 mt-1 mr-3"
                                    href="{{route('home.index')}}">Home &nbsp;<span
                                        class="d-none d-md-inline">|</span></a>
                                @if(!empty(Auth::user()->provider))
                                <a class="nav-link navItem text-light font-weight-bold py-2 mt-1 mr-3"
                                    href="{{route('recipes.index')}}">Minhas Receitas &nbsp;<span
                                        class="d-none d-md-inline">|</span></a>
                                @else
                                <a class="nav-link navItem text-light font-weight-bold py-2 mt-1 mr-3"
                                    href="{{route('user.recipes')}}">Receitas &nbsp;<span
                                        class="d-none d-md-inline">|</span></a>
                                @endif
                                @if (empty(Auth::user()->provider))
                                <a class="nav-link navItem text-light font-weight-bold py-2 mt-1 mr-lg-5"
                                    href="{{route('community.index')}}">Comunidade &nbsp;<span
                                        class="d-none d-md-inline">|</span></a>
                                @endif
                                @if (Auth::guest())
                                <a class="nav-link navItem text-light font-weight-bold d-inline py-2 mt-1 ml-lg-5"
                                    href="{{route('login')}}">Acesse</a>
                                <a class="nav-link navItem text-light font-weight-bold d-inline py-2 mt-1 mr-n4"
                                    href="{{route('register')}}">Registre-se</a>
                                @endif
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="order-3">
                    @if(!Auth::guest())
                    <button class="btn btn-link pt-3 pb-4 pb-md-3 px-3" id="button-perfil" data-target="#modal-user"
                        data-toggle="modal">
                        <img id="img-perfil" src="{{asset('app/avatar/'.$user->avatar)}}" class="mr-md-2"
                            alt="imagem perfil">
                        <span class="font-weight-bold navItem text-light d-none d-sm-inline">
                            <?php
                                $nome = $user->name;
                                $partes = explode(" " , $nome);
                                echo $partes[0];
                            ?>
                        </span>
                    </button>
                    <a href="{{route('logout')}}"
                        class="text-light navItem font-weight-bold nav-link py-3 d-none d-lg-inline">Sair</a>
                    @endif
                </div>
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
                            <img id="img-user" class="img-thumbnail img-fluid"
                                src="{{asset('app/avatar/'.$user->avatar)}}" alt="Foto do usuário">
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="pb-3">
                        <div class="pb-2 text-center">
                            <h5>
                                @if($user->provider)
                                Informações da empressa
                                @else
                                Informações do perfil
                                @endif
                            </h5>
                        </div>
                        <div>
                            Nome : {{$user->name}}<br>
                            E-mail : {{$user->email}}<br>

                            @if($user->phone)
                            Telefone : {{$user->phone}}<br>
                            @endif

                            @if($user->cpf)
                            CPF : {{$user->cpf}}<br>
                            @endif

                            @if($user->date_birth)
                            Data de Nascimento : {{date('d/m/Y', strtotime($user->date_birth))}}
                            @endif

                            @if($user->provider)
                            CNPJ : {{$provider->cnpj}}<br>
                            Data de Abertura : {{date('d/m/Y', strtotime($provider->date_opening))}}
                            @endif
                        </div>
                        <div class="mt-3">
                            @if($user->provider)
                            <a href="{{route('profile.provider')}}" class="mt-5">Editar informações</a>
                            @else
                            <a href="{{route('profile')}}" class="mt-5">Editar informações</a>
                            @endif
                        </div>
                    </div>
                    <div>
                        <div class="pb-2 text-center">
                            <h5>Endereço Principal</h5>
                        </div>
                        <div class="pb-2">
                            @if (!empty($address))
                            Cep : {{str_replace('.' ,'',$address->zip_code)}}<br>
                            Município : {{$address->county}}<br>
                            Bairro : {{$address->neighborhood}}<br>
                            Rua : {{$address->street}}<br>
                            Número : {{$address->number}}<br>
                            {{($address->complement)?'Complemento : '.$address->complement:""}}
                            @else
                            Nenhum endereço cadastrado
                            @endif

                        </div>
                        @if(!$user->provider)
                        <div class="mt-2">
                            <a href="{{route('address.index')}}" class="mt-5">Ver endereços</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <a href="{{route('logout')}}" class="btn btn-info">Sair</a>
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
                    <a href="{{route('home.index')}}"><img class="mt-2" src="{{asset('favicon.ico')}}" height="50"
                            alt="Logo Veganices"></a>
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
                <h6 class="py-2 font-weight-bold m-0">@Copyright 2019-2020 Veganices</h6>
            </div>
        </div>

    </footer>

    @yield('js')
</body>

</html>
