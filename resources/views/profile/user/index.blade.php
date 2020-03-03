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
            <img id="imageProfile" src="{{asset('app/avatar/'.$user->avatar)}}" alt="Imagem de Perfil">
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
            <h4>{{$user->name}}</h4>
        </div>
        <div class="mt-5">
            <h5>Informações pessoais</h5>
            <p class="pt-2">Email : {{$user->email}}</p>
            <p>Telefone :
                @if($user->phone)
                {{$user->phone}}
                @else
                Não informado
                @endif
            </p>
            <p>CPF :
                @if($user->cpf)
                {{$user->cpf}}
                @else
                Não informado
                @endif
            </p>
            <p>Data de nascimento :
                @if($user->date_birth)
                {{date('d/m/Y', strtotime($user->date_birth))}}
                @else
                Não informado
                @endif
            </p>
        <a href="{{route('profile.edit')}}" class="btn btn-link pl-0">Editar informacões</a>
        </div>

        <div class="mt-5">
            <h5>Minhas Compras</h5>
            @if (!empty($myRequests->all()))
            @foreach ($myRequests as $myRequest)
                Tem
            @endforeach
            @else
            <p class="pt-2">Você não fez nenhum pedido</p>
            @endif
        </div>

        <div class="my-5">
            <h5>Minhas Postagens</h5>
            @if (!empty($myPosts->all()))
            @foreach ($myPosts as $myPost)
                Tem
            @endforeach
            @else
            <p class="py-2">Você não tem postagens</p>
            @endif
        </div>

        <div class="my-5">
            <h5>Minhas receitas favoritas</h5>
            @if ($myFavorites)
            @foreach ($myFavorites as $myFavorite)
                {{$myFavorite->name}}<br>
            @endforeach
            @else
            <p class="py-2">Você não tem favoritos</p>
            @endif
        </div>

    </div>
</div>

<form action="{{route('del.image',['id' => $user->id , 'route' => 'profile'])}}" method="post" class="d-none"
    onsubmit="return confirm('Apagar sua foto de perfil?')">
    @csrf
    @method('DELETE')
    <button id="deleteImage"></button>
</form>

<form action="{{route('upload',['route' => 'profile'])}}" method="post" enctype="multipart/form-data">
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
