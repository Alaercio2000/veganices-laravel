@extends('layouts.template')

@section('title',"$recipe->name")

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/recipes/item/item.css')}}">
@endsection

@section('js')

<script src="{{asset('assets/js/filter/filter.js')}}"></script>
<script src="{{asset('assets/js/favorite/favorite.js')}}"></script>

@endsection

@section('content')

@php
    $isFavorite = false;
    if(!empty($favorite)){
        $isFavorite = true;
    }
@endphp

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
                    <div class="col-8 card-body d-flex flex-column pl-0">
                        <h4 class="card-title mt-2">{{$recipe->name}}</h4>
                    </div>
                    <div class="col-1 card-body d-flex flex-column align-self-center">
                        <a href="javascript:void('')" id="favorite-button" @if(!Auth::guest()) onClick="setFavorite({{$recipe->id .','.Auth::user()->id }})"@else title="Você precisa está logado para adicionar favorito" @endif class="card-link align-self-center d-flex flex-column">
                            <i id="favorite-icon{{$recipe->id}}" class="material-icons text-danger align-self-center">{{($isFavorite == true)?'favorite':'favorite_border'}}</i>
                        </a>
                    </div>
                    <div id="recipeImage" class="col-12 col-md-9 pl-0" data-ride="carousel">
                        <img src="{{asset('app/imageRecipes/'.$recipe->image)}}" class="d-block w-100">
                    </div>
                    <aside class="col-12 col-md-3 bg-light pt-2">
                        <h4>Preço:</h4>
                        <span style="font-size:26px" class="font-weight-bolder text-warning pt-2 d-block">R$
                            {{str_replace('.',',',$recipe->price)}}</span>

                        <div class="pt-3 text-secondary mb-4">Em estoque : {{$recipe->stock}}</div>
                        @if(!Auth::guest())
                    @if(!Auth::user()->provider)
                        @if ($existCart)
                            <form action="{{route('cart.destroy.recipe',$recipe->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-outline-danger mb-4">Remover do carrinho</button>
                            </form>
                        @else
                            <form action="{{route('cart.store',$recipe->id)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-info mb-4">Adicionar no carrinho</button>
                            </form>
                        @endif
                    @endif

                @else
                <button disabled class="btn btn-warning mb-4"
                    title="Você precisa estar logado para adicionar no carrinho">Adicionar no carrinho</button>
                @endif
                    </aside>
                    <div class="d-flex">
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
