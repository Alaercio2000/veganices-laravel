@extends('layouts.auth')

@section('title','Cadastro Profissional')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/register/style.css')}}">
@endsection

@section('js')
<script src="{{asset('assets/js/register/provider/script.js')}}"></script>
@endsection

@section('content')

<h3 class="text-center font-weight-normal py-3">Cadastro Profissional</h3>

<form method="POST" class="p-3">
    @csrf

    <div class="form-group">
        <input type="text" name="cnpj" id="cnpj"
            class="form-control @error('cnpj') is-invalid @enderror @if(session('cnpj')) is-invalid @endif"
            placeholder="Digite o CNPJ" value="{{old('cnpj')}}">
        <div class="invalid-feedback">
            {{$errors->first('cnpj')}}
            @if(session('cnpj'))
            {{session('cnpj')}}
            @endif
        </div>
    </div>

    <div class="form-group">
        <input type="text" name="email" id="email"
            class="form-control @error('email') is-invalid @enderror"
            placeholder="Digite o email de acesso" value="{{old('email')}}">
        <div class="invalid-feedback">
            {{$errors->first('email')}}
        </div>
    </div>

    <div class="form-group">
        <input id="password" name="password" class="form-control @error('password') is-invalid @enderror"
            type="password" placeholder="Senha">
        <div class="invalid-feedback">
            {{$errors->first('password')}}
        </div>
    </div>

    <div class="form-group">
        <input id="password_confirmation" name="password_confirmation"
            class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Repita a senha">
    </div>

    <div  class="form-group">
        <input id="phone" name="phone" class="form-control  @error('phone') is-invalid @enderror" type="text"
            value="{{old('phone')}}" placeholder="Celular para contato" maxlength="14">
        <div class="invalid-feedback">
            {{$errors->first('phone')}}
        </div>
    </div>

    <div  class="form-group">
        <input id="date_create" name="date_create"
            class="form-control  @error('date_create') is-invalid @enderror @if(session('date_create')) is-invalid @endif"
            type="text" value="{{old('date_create')}}" placeholder="Data de crição da empresa" maxlength="14">
        <div class="invalid-feedback">
            {{$errors->first('date_create')}}
            @if(session('date_create'))
            {{session('date_create')}}
            @endif
        </div>
    </div>

    <div class="form-group">
        <input class="btn btn-success w-100 mt-3" type="submit" value="Cadastrar">
    </div>

    <h6 class="py-2 text-secondary">
        Não é Profissional?
        <a href="{{route('register')}}"> Cadastrar-se</a>
    </h6>
</form>

@endsection
