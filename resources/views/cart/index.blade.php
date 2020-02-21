@extends('layouts.template')

@section('title','Carrinho')

@section('content')

<div class="container">

    <h2 class="pt-5 mt-4">Meu Carrinho</h2>

        @if(!empty($products->all()))

        @foreach ($products->all() as $product)

        @endforeach

        @else
        <div style="height:200px" class="border text-center mt-4">
            <h3 class="pt-4">Seu carrinho está vazio</h3>
        <div class="pt-2">
            <a class="btn btn-link text-secondary" href="{{route('home.index')}}">Voltar para página inicial</a>ou
            <a class="btn btn-link text-secondary" href="{{route('user.recipes')}}">escolhar outras receitas</a>
        </div>
        </div>
        @endif

</div>
@endsection
