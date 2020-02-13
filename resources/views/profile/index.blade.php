<?php
$srcImg = 'default.jpg';
$user = Auth::user();
if (Auth::user()->avatar){
    $srcImg = Auth::user()->avatar;
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
        <div class="div-img d-flex justify-content-center align-items-center">
            <img id="imageProfile" src="{{asset('app/avatar/'.$srcImg)}}" alt="Imagem de Perfil">
            <i id="iconCamera" class="material-icons text-light">
                camera_alt
            </i>
            <div id="optionsClickImage">
                <span class="options">Ver foto</span>
                <label class="options" for="uploadImage">Carregar foto</label>
                <label class="options" for="deleteImage">Remover foto</label>
            </div>
        </div>

            <img id="testePreview" src="">

        <form method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="file" name="uploadImage" id="uploadImage">
            <button id="" type="submit" class="d-none">Confirmar</button>
        </form>
    </div>
</div>

<form action="{{route('del.image',['id' => $user->id])}}" method="post" class="d-none">
    @csrf
    @method('DELETE')
<button id="deleteImage"></button>
</form>

@endsection
