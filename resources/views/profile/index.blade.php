<?php
$srcImg = '/media/img/sem-foto.png';

if (Auth::user()->avatar){
    $srcImg = '/media/img/'.Auth::user()->avatar;
}
?>

@extends('layouts.template')

@section('title','Meu Perfil')

@section('css')

<style>
    #aside{
        background-image: url({{asset('assets/img/profile/fundo.png')}});
    }
</style>
<link rel="stylesheet" href="{{asset('assets/css/profile/style.css')}}">
@endsection

@section('content')

<div class="d-flex">
    <div id="aside" class="col-4">

    </div>
    <div id="corpo" class="col-8">
        <div class="text-center div-img">
        <img id="imageProfile" src="{{$srcImg}}" alt="Imagem de Perfil">
        <h4 class="pt-2">{{Auth::user()->name}}</h4>
        </div>
    </div>
</div>

@endsection
