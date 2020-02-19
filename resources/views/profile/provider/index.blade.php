@extends('layouts.template')

@section('title','Meu Perfil')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/profile/style.css')}}">
@endsection

@section('js')
<script src="{{asset('assets/js/profile/user/script.js')}}"></script>
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
                @if($user->avatar != 'default.jpg')<span id="viewImage" class="options">Ver foto</span>@endif
                <label class="options" for="uploadImage">Carregar foto</label>
                @if($user->avatar != 'default.jpg')<label class="options" for="deleteImage">Remover foto</label>@endif
            </div>
        </div>
        <div class="text-center mt-3">
            <h4>{{$provider->name}}</h4>
        </div>

        <div>
            <h5 class="py-3">Informações da empresa</h5>
            <p>E-mail : {{$user->email}}</p>
            <p>CPNJ : {{$provider->cnpj}}</p>
            <p>Telefone : {{$user->phone}}</p>
            <p>Data de Abertura : {{date('d/m/Y', strtotime($provider->date_opening))}}</p>
        <a href="{{route('profile.provider.edit')}}">Editar informações</a>
        </div>
        <div class="pt-3">
            <h5 class="pb-3">Minhas Receitas</h5>
            @if($recipes->all())
            @foreach ($recipes->all() as $recipe)
            <a class="btn btn-link p-0 my-1" target="_blank"
                href="{{route('recipes.show',['recipe' => $recipe->id])}}">{{$recipe->name}}</a><br>
            @endforeach
            @else
            Não tem receitas
            @endif
        </div>
        <div class="pt-4 pb-5">
            <h5>Endereço da empresa</h5>
            @if (!empty($address))
            <p>Cep : {{$address->zip_code}}</p>
            <p>Rua : {{$address->street}}</p>
            <p>Bairro : {{$address->neighborhood}}</p>
            <p>Número : {{$address->number}}</p>
            <p>Cidade : {{$address->county}}</p>
            <p>UF : {{$address->state}}</p>
            @else
            Não tem endereço
            @endif
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
