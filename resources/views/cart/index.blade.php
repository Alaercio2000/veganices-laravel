@extends('layouts.template')

@section('title','Carrinho')

@section('content')

<h2 class="text-center pt-5 mt-4">Meu Carrinho</h2>

@foreach ($recipes as $recipe)
    Nome : {{$recipe->name}}<br>
@endforeach

@endsection
