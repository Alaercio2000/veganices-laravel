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
                @if($user->avatar != null)<span id="viewImage" class="options">Ver foto</span>@endif
                <label class="options" for="uploadImage">Carregar foto</label>
                @if($user->avatar != null)<label class="options" for="deleteImage">Remover foto</label>@endif
            </div>
        </div>
        <div class="text-center mt-3">
            <h4>{{$user->name}}</h4>
        </div>

    </div>
</div>

<form action="{{route('del.image',['id' => $user->id , 'route' => 'profile.provider'])}}" method="post" class="d-none"
    onsubmit="return confirm('Apagar sua foto de perfil?')">
    @csrf
    @method('DELETE')
    <button id="deleteImage"></button>
</form>

<form action="{{route('upload',['route' => 'profile.provider'])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="file" name="uploadImage" id="uploadImage">
    <button id="buttonUpload" type="submit" class="d-none">Confirmar</button>
</form>

<div id="divViewImageProfile">
    <i id="iconClose" class="material-icons">
        close
    </i>
    <img id="viewImageProfile" src="{{asset('app/avatar/'.$user->avatar)}}">
</div>

<div id="divCardUpload">
    <div id="cardUploadImage" class="card">
        <div class="card-body">
            <img id="imageUpload" class="card-img-top" src="">

            <a id="closeUpload" class="btn btn-dark mt-3" href="javascript:void('')">Fechar</a>
            <button id="confirmedUpload" class="btn btn-success float-right mt-3"><label id="labelConfimedImage"
                    class="p-0 m-0" for="buttonUpload">Confirmar</label></button>
        </div>
    </div>
</div>
@endsection
