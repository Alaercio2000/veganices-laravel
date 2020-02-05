@extends('layouts.auth')

@section('title','Cadatro de Usuário')

@section('content')
<h3 class="text-center font-weight-normal py-3">Crie sua conta</h3>
<form method="post" class="p-3">
    @csrf

    <div class="form-group">
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
            placeholder="Nome" value="{{old('name')}}">
        <div class="invalid-feedback">
            {{$errors->first('name')}}
        </div>
    </div>

    <div class="form-group">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
            placeholder="E-mail" value="{{old('email')}}">
        <div class="invalid-feedback">
            {{$errors->first('email')}}
        </div>
    </div>

    <div class="form-group">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
            id="password" placeholder="Senha">
        <div class="invalid-feedback">
            {{$errors->first('password')}}
        </div>
    </div>
    <div class="form-group">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
            id="password_confirmation" placeholder="Repita sua senha">
    </div>

    <div class="form-group">
        <input class="btn btn-success w-100 mt-3" type="submit" value="Cadastrar">
    </div>
</form>

<h6 class="pl-3 pb-3 text-secondary">
    Cadastro Profissional?
    <a href="{{route('register.provider')}}"> Cadastrar-se</a>
</h6>

<div class="divider">
    <span> ou entre com</span>
    <hr>
</div>

<div class="text-center">
    <a href="#" class="btn border mt-3 mr-md-4 social"><img class="mb-1" width="17"
            src="{{asset('assets/img/login/logo-facebook.png')}}" alt="logo facebook"><span class="text-secondary">
            Facebook</span>
    </a>
    <a href="#" class="btn border mt-3 social"><img class="mb-1" width="17"
            src="{{asset('assets/img/login/logo-google.png')}}" alt="logo google"><span class="text-secondary">
            Google</span>
    </a>
</div>

<h6 class="pl-3 py-4 text-secondary">
    Já tem cadastro?
    <a href="{{route('login')}}"> Entrar</a>
</h6>
@endsection
