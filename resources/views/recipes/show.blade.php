@extends('layouts.template')

@section('title','item')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/recipes/item/item.css')}}">
@endsection

@section('content')

  <div class="space">
  </div>
  <div class="banner">
    <img class="bannerImg" src="{{asset('assets/img/recipes/item/banner.jpg')}}" />
    <div class="container">
      <div class="row">
        <div class="input-group mb-3 searchInput">
          <input type="text" class="form-control" placeholder="Restaurantes" aria-label="Restaurantes"
            aria-describedby="button-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button" id="button-addon2">Pesquisar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container">
      <div class="row mt-5">
        <main class="col-12">
          <div class="row">
            <div class="col-6 card-body d-flex flex-column pl-0">
              <h5 class="card-title mt-2">Restaurante 1</h5>
              <h6 class="card-subtitle mb-2 text-muted">Número de estrelas</h6>
            </div>
            <div class="col-4 col-md-2 card-body d-flex flex-column align-self-center">
              <button type="button" class="btn btn-primary">Avaliar</button>
            </div>
            <div class="col-1 card-body d-flex flex-column align-self-center">
              <a href="#" class="card-link align-self-center d-flex flex-column">
                <i class="material-icons align-self-center">favorite</i>
              </a>
            </div>
            <div id="carouselExampleControls" class="carousel slide col-12 col-md-9" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{asset('app/imageRecipes/'.$recipe->image)}}" class="d-block w-100">
                </div>
                <div class="carousel-item">
                  <img src="{{asset('assets/img/recipes/item/restaurante_2.jpg')}}" class="d-block w-100">
                </div>
                <div class="carousel-item">
                  <img src="{{asset('assets/img/recipes/item/restaurante_3.png')}}" class="d-block w-100">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <aside class="col-12 col-md-3">
              <h4>Entrar em contato </h4>
              <form>
                  <div class="form-group">
                      <input type="text" class="form-control mb-3 mt-5" id="nome" aria-describedby="nome" placeholder="Nome">
                      <input type="text" class="form-control mb-3" id="sobrenome" aria-describedby="sobrenome" placeholder="Sobrenome">
                      <input type="email" class="form-control mb-3" id="email" aria-describedby="emai" placeholder="Email">
                      <input type="text" class="form-control mb-3" id="telefone" placeholder="Telefone">
                      <textarea class="form-control" id="telefone"> Comentário</textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </aside>
            <div class="row">
              <div class="col-12 col-md-8 my-5">
                <h4>Informações sobre o restaurante</h4>
                <p class="card-text align-self-center m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Morbi vel sapien eu lacus consectetur sodales. Nullam
                  finibus arcu quis luctus ultricies. Phasellus bibendum rhoncus euismod.Lorem ipsum dolor sit amet,
                  consectetur adipiscing elit. Morbi vel sapien eu lacus consectetur sodales. Nullam
                  finibus arcu quis luctus ultricies. Phasellus bibendum rhoncus euismod.Lorem ipsum dolor sit amet,
                  consectetur adipiscing elit. Morbi vel sapien eu lacus consectetur sodales. Nullam
                  finibus arcu quis luctus ultricies. Phasellus bibendum rhoncus euismod.Lorem ipsum dolor sit amet,
                  consectetur adipiscing elit. Morbi vel sapien eu lacus consectetur sodales. Nullam
                  finibus arcu quis luctus ultricies. Phasellus bibendum rhoncus euismod.</p>
              </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-2">
                    <h4>Avaliações</h4>
                  <div class="card-body d-flex flex-column">
                    <img class="restaurante" src="{{asset('assets/img/recipes/item/perfil.jpg')}}" />
                  </div>
                </div>
                <div class="col-6 col-md-6">
                  <div class="row">
                    <div class="col-9 card-body d-flex flex-column pl-0">
                      <h5 class="card-title mt-2">Nome Usuário</h5>
                      <h6 class="card-subtitle mb-2 text-muted">Data da avaliação</h6>
                    </div>
                    <p class="card-text align-self-center m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel sapien eu lacus consectetur sodales. Nullam
                      finibus arcu quis luctus ultricies. </p>
                  </div>
                </div>
              </div>
              </div>
          </div>
        </main>
      </div>
    </div>
  </div>


@endsection
