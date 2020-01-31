@extends('layouts.template-auth')

@section('title','login')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/login/style.css')}}">
@endsection

@section('content')

<h4 class="py-3 font-weight-normal text-center">Entrar Em Veganices</h4>

<form method="post" class="p-3">
    <div class="form-group">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" id="password" placeholder="Senha">
    </div>
    <h6 class="font-weight-normal text-left pl-2"><a href="#">Esqueceu a senha?</a></h6>
    <div class="form-group">
        <input class="btn btn-success w-100" type="submit" value="Acessar">
    </div>
</form>

<a href="#" class="btn border px-5 mr-4 social"><img class="mb-1" width="17" src="{{asset('assets/img/login/logo-facebook.png')}}"
        alt="logo facebook"><span class="text-secondary"> Facebook</span>
</a>
<a href="#" class="btn border px-5 social"><img class="mb-1" width="17" src="{{asset('assets/img/login/logo-google.png')}}"
    alt="logo google"><span class="text-secondary"> Google</span>
</a>

<h6 class="py-4">
    Não tem cadastro?
    <a href="{{route('register')}}">Cadastrar-se</a>
</h6>

@endsection
