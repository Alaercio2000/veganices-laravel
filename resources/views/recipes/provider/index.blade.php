
  @extends('layouts.template')

  @section('title','Receitas')

  @section('content')

  <link rel="stylesheet" href="{{asset('assets/css/recipes/style.css')}}">

  <div class="space">
  </div>
  <div class="banner">
    <img class="bannerImg" src="{{asset('assets/img/recipes/banner.jpg')}}" />
    <div class="container">
      {{-- <div class="row">
        <div class="input-group mb-3 searchInput">
          <input type="text" class="form-control" placeholder="Receitas" aria-label="Receitas" aria-describedby="button-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button" id="button-addon2">Pesquisar</button>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
  <div class="content">
    <div class="container">
      <div class="row mt-5">
        <main class="col-12 col-sm-12">
          <div class="text-right my-3">
          <a href="{{route('recipes.create')}}" class="btn btn-success">Adicionar</a>
        </div>
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

                <p class="card-text align-self-center m-0" style="max-width:100ch; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$recipe->preparation_method}}</p>
                  <div class="col-12 d-flex justify-content-between my-3">
                    <span style="font-size:20px" class="font-weight-bolder text-warning">R$ {{str_replace('.',',',$recipe->price)}}</span>
                  <a class="text-light btn btn-primary" href="{{route('recipes.show',['recipe'=> $recipe->id ])}}">Ver receita</a>
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


