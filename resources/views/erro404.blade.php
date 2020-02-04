@extends('layouts.auth')

@section('title','Página não encontrada')

<style>
    div a{
        font-size: 30px;
    }
    a , h1 {
        font-family: 'Courier New', Courier, monospace;
    }
</style>

@section('content')

<h1 class="text-center pt-3">Página não encontrada</h1>

<div class="text-center py-5">
    <a href="{{route('home.index')}}" class="font-weight-bold">Ir para Home</a>
</div>
@endsection
