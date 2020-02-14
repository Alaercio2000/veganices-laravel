@extends('layouts.template')

@section('title','item')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/recipes/item/item.css')}}">
@endsection

@section('content')

  <div class="space">
  </div>
  <div class="banner">
    <img class="bannerImg" src="{{asset('assets/img/recipes/banner.jpg')}}" />
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
            <div class="col-5 card-body d-flex flex-column pl-0">
              <h5 class="card-title mt-2">{{$recipe->name}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">Número de estrelas</h6>
            </div>
            <div class="col-2 col-md-1 card-body d-flex flex-column align-self-center">
            <a href="{{route('recipes.edit',['recipe'=> $recipe->id ])}}">Editar</a>
            </div>
            <div class="col-4 col-md-2 card-body d-flex flex-column align-self-center">
              <button type="button" class="btn btn-primary">Avaliar</button>
            </div>
            <div class="col-1 card-body d-flex flex-column align-self-center">
              <a href="#" class="card-link align-self-center d-flex flex-column">
                <i class="material-icons align-self-center">favorite</i>
              </a>
            </div>
            <div id="recipeImage" class="col-12 col-md-9" data-ride="carousel">
                  <img src="{{asset('app/imageRecipes/'.$recipe->image)}}" class="d-block w-100">   
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
                <h4>Informações sobre a receita</h4>
                <h6 class="mt-3">Ingredientes</h6>
                <p class="card-text align-self-center m-0">{{$recipe->ingredients}}</p>
                <h6 class="mt-3">Modo de preparo</h6>
                <p class="card-text align-self-center m-0">{{$recipe->preparation_method}}</p>
              </div>
            </div>
              </div>
          </div>
        </main>
      </div>
    </div>
  </div>


@endsection
