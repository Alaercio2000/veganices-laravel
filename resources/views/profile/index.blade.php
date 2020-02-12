<?php
$srcImg = '/media/img/sem-foto.png';

if (Auth::user()->avatar){
    $srcImg = '/media/img/'.Auth::user()->avatar;
}
?>

@extends('layouts.template')

@section('title','Meu Perfil')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/profile/style.css')}}">
@endsection

@section('js')
<script src="{{asset('assets/js/profile/script.js')}}"></script>
@endsection

@section('content')

<div id="content" class="d-flex">
    <div id="aside" class="col-md-4 d-none d-md-block"
        style="background-image:url({{asset('assets/img/profile/fundo.png')}})"></div>
    <div id="corpo" class="col">
        <div id="tt" class="div-img d-flex justify-content-center align-items-center">
            <img id="imageProfile" src="{{$srcImg}}" alt="Imagem de Perfil">
            <i id="iconCamera" class="material-icons text-light">
                camera_alt
            </i>
            <div id="optionsClickImage">
                <span class="spanOptions">Ver foto</span>
                <span class="spanOptions">Carregar foto</span>
                <span class="spanOptions">Remover foto</span>
            </div>
        </div>
    </div>
</div>

@endsection
