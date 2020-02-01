@extends('layouts.auth')

@section('title','login')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/login/style.css')}}">
@endsection
@section('content')

<h4 class="py-3 font-weight-normal text-center">Entrar Em Veganices</h4>

<form method="post" class="p-3">
    @csrf
    <div class="form-group">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
            placeholder="Email" value="{{old('email')}}">
        <div class="invalid-feedback">
            Email invalido
        </div>
    </div>
    <h6 class="font-weight-normal text-right pr-2"><a href="#">Esqueceu a senha?</a></h6>
    <div class="form-group">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
            id="password" placeholder="Senha">
            <div class="invalid-feedback">
               Email e/ou senhas inválidos
            </div>
    </div>
    <div class="form-group" class="text-left">
        <input id="remember" type="checkbox" name="remember" class="ml-1">
        <label for="remember" class="text-secondary">Lembrar de mim</label>
    </div>
    <div class="form-group">
        <input class="btn btn-success w-100" type="submit" value="Acessar">
    </div>
</form>

<div class="divider">
    <span> ou entre com</span>
    <hr>
</div>

<div class="text-center">
    <a href="#" class="btn border mt-3 mr-lg-4 social"><img class="mb-1" width="17"
            src="{{asset('assets/img/login/logo-facebook.png')}}" alt="logo facebook"><span class="text-secondary">
            Facebook</span>
    </a>
    <a href="#" class="btn border mt-3 social"><img class="mb-1" width="17"
            src="{{asset('assets/img/login/logo-google.png')}}" alt="logo google"><span class="text-secondary">
            Google</span>
    </a>
</div>

<h6 class="pl-4 py-4 text-secondary">
    Não tem cadastro?
    <a href="{{route('register')}}">Cadastrar-se</a>
</h6>

@endsection
