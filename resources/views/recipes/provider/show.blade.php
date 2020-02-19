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
            <div class="col-7 card-body d-flex flex-column pl-0">
              <h5 class="card-title mt-2">{{$recipe->name}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">Número de estrelas</h6>
            </div>
            <div class="col-2 col-md-1 card-body d-flex align-self-center">
            <a href="{{route('recipes.edit',['recipe'=> $recipe->id ])}}"><i class="material-icons align-self-center mr-4 border-right pr-4">edit</i></a>
                <form action="{{route('recipes.destroy',['recipe'=> $recipe->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <button id="delete" class="d-none" type="submit"></button>
                    <label for="delete"><i class="material-icons align-self-center text-danger">delete</i></label>
                </form>
            </div>
            <div id="recipeImage" class="col-12 col-md-9" data-ride="carousel">
                  <img src="{{asset('app/imageRecipes/'.$recipe->image)}}" class="d-block w-100">
            </div>
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
