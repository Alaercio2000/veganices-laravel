
  @extends('layouts.template')

  @section('title','Receitas')

  @section('content')

  <link rel="stylesheet" href="{{asset('assets/css/recipes/style.css')}}">

  <div class="space">
  </div>
  <div class="banner">
    <img class="bannerImg" src="{{asset('assets/img/recipes/banner.jpg')}}" />
    <div class="container">
      <div class="row">
        <div class="input-group mb-3 searchInput">
          <input type="text" class="form-control" placeholder="Restaurantes" aria-label="Restaurantes" aria-describedby="button-addon2">
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
        <aside class="col-12 col-md-3 border-right px-4 aside">
          <form class=" ">
            <h4>Filtro</h4>
            <div>
              @foreach ($categoryRecipes as $item)
                <div class="form-check">
                  <input class="form-check-input category-recipe" type="checkbox" name="category_recipe[]" value="{{$item['id']}}" id="category-check-{{$item['id']}}">
                  <label class="form-check-label" for="category-check-{{$item['id']}}">
                    {{$item['name']}}
                  </label>
                </div>
              @endforeach
            </div>
          </form>
        </aside>
        <main class="col-12 col-sm-9">
          @foreach($recipes as $recipe)
            <div class="row border-top ml-3">
              <div class="col-12 col-md-5">
                <div class="card-body d-flex flex-column">
                  <img class="restaurante" src="{{asset('app/imageRecipes/'.$recipe['image'])}}" />
                </div>
              </div>
              <div class="col-12 col-md-7">
                <div class="row">
                  <div class="col-9 card-body d-flex flex-column pl-0">
                    <h5 class="card-title mt-2">{{$recipe['name']}}</h5>
                    {{-- <h6 class="card-subtitle mb-2 text-muted">Um breve descrição do produto</h6> --}}
                  </div>
                  <div class="col-3 card-body d-flex flex-column">
                    <a href="#" class="card-link align-self-center d-flex flex-column">
                      <i class="material-icons align-self-center">favorite</i>
                    </a>
                  </div>
                <p class="card-text align-self-center m-0">{{$recipe->preparation_method}}</p>
                  <div class="col-12 d-flex justify-content-end my-3">
                  <a class="text-light btn btn-primary" href="{{route('user.recipe.show',['id'=> $recipe->id ])}}">Ver receita</a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </main>
      </div>
    </div>
  </div>

  <script src="{{asset('assets/js/filter/filter.js')}}"></script>

  @endSection


