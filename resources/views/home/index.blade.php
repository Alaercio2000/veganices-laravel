@extends('layouts.template')

@section('title','Home')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/home/style.css')}}">
@endsection

@section('content')

<div id="fundoBuscar" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-interval="5000">
            <img height="500px" src="{{asset('assets/img/home/imgSlide1.jpg')}}" class="d-block w-100"
                alt="Imagens De Legumes e Vegetais">
        </div>
        <div class="carousel-item" data-interval="5000">
            <img height="500px" src="{{asset('assets/img/home/imgSlide2.jpg')}}" class="d-block w-100"
                alt="Imagens De Legumes e Vegetais">
        </div>
        <div class="carousel-item">
            <img height="500px" src="{{asset('assets/img/home/imgSlide3.jpg')}}" class="d-block w-100"
                alt="Imagens De Legumes e Vegetais">
        </div>
    </div>
</div>

<div id="buscarGeral" class="container position-relative">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-9 col-lg-6">
            <h4 class="text-center pb-3 text-light font-weight-bold ">
                Aqui você encontra inúmeras receitas e ainda pode recebê-las em casa!
            </h4>
        </div>
    </div>
</div>

<main class="px-3">

    <section class="pb-5">
        <div id="recomendacoesPai" class="container-fluid">
            <div class="row">
                <div class="col-12 col-pq-6 col-md-3 text-center elementoHover">
                    <a href="{{route('user.recipes')}}">
                        <img class="recomendacoesImagem" src="{{asset('assets/img/home/icons_2.png')}}"
                            alt="Restaurantes veganos">
                    </a>
                    <h6 class="py-3 textElemento">Receitas veganas deliciosas</h6>
                </div>
                <div class="col-12 col-pq-6 col-md-3 text-center">
                    <a href="{{route('user.recipes')}}">
                        <img class="recomendacoesImagem" src="{{asset('assets/img/home/icons_3.png')}}"
                            alt="Diario vegano">
                    </a>
                    <h6 class="py-3">Ingredientes recebidos em casa</h6>
                </div>
                <div class="col-12 col-pq-6 col-md-3 text-center">
                    <a href="{{route('cart.index')}}">
                        <img class="recomendacoesImagem" src="{{asset('assets/img/home/icons_1.png')}}"
                            alt="Comunidade">
                    </a>
                    <h6 class="py-3">Encha seu carrinho</h6>
                </div>
                <div class="col-12 col-pq-6 col-md-3 text-center">
                    <a href="{{route('community.index')}}">
                        <img class="recomendacoesImagem" src="{{asset('assets/img/home/icons_4.png')}}"
                            alt="Dicas de um vegano">
                    </a>
                    <h6 class="py-3">Troca de experiências</h6>
                </div>
            </div>
        </div>
    </section>

    <hr>

    <section class="pt-4 pb-5">
        <h3 class="text-center pb-5">Últimas receitas adicionadas</h3>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3 pb-4 cardDestaques">
                    <div class="card">
                        <img height="200" src="{{asset('assets/img/home/restauranteImagemTeste.jpg')}}"
                            class="card-img-top imagemCard" alt="Melhor Restaurante Mês">
                        <div class="card-body">
                            <h5 class="card-title">Restaurantes</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum alias
                                deserunt numquam facere
                                ipsam porro, molestiae est placeat totam ipsum autem! Provident expedita repellendus
                                temporibus tenetur earum harum assumenda porro?</p>
                            <a href="#" class="btn btn-warning mt-3">Ver mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 pb-4 cardDestaques">
                    <div class="card">
                        <img height="200" src="{{asset('assets/img/home/nutricionistaImagemTeste.jpg')}}"
                            class="card-img-top imagemCard2" alt="Melhor Nutricionista Mês">
                        <div class="card-body">
                            <h5 class="card-title">Nutricionistas</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum alias
                                deserunt numquam facere
                                ipsam porro, molestiae est placeat totam ipsum autem! Provident expedita repellendus
                                temporibus
                                tenetur earum harum assumenda porro?</p>
                            <a href="#" class="btn btn-warning mt-3">Ver mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 pb-4 cardDestaques">
                    <div class="card">
                        <img height="200" src="{{asset('assets/img/home/postImagemTeste.jpg')}}"
                            class="card-img-top imagemCard" alt="Melhor Postagem Mês">
                        <div class="card-body">
                            <h5 class="card-title">Postagens</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum alias
                                deserunt numquam facere
                                ipsam porro, molestiae est placeat totam ipsum autem! Provident expedita repellendus
                                temporibus tenetur earum harum assumenda porro?</p>
                            <a href="#" class="btn btn-warning mt-3">Ver mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 pb-4 cardDestaques">
                    <div class="card">
                        <img height="200" src="{{asset('assets/img/home/fazerCasa.jfif')}}"
                            class="card-img-top imagemCard" alt="Melhor Receita Mês">
                        <div class="card-body">
                            <h5 class="card-title">Receitas</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum alias
                                deserunt numquam facere
                                ipsam porro, molestiae est placeat totam ipsum autem! Provident expedita repellendus
                                temporibus tenetur earum harum assumenda porro?</p>
                            <a href="#" class="btn btn-warning mt-3">Ver mais</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <hr>

</main>

@endsection
