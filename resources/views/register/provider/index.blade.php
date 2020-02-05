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
        <input type="text" name="cnpj" id="cnpj" class="form-control @error('cnpj') is-invalid @enderror"
            placeholder="Digite o CNPJ" value="{{old('cnpj')}}">
        <div class="invalid-feedback">
            {{$errors->first('cnpj')}}
        </div>
    </div>

    <div class="form-group">
        <input id="password" name="password" class="form-control @error('password') is-invalid @enderror" type="password"
            placeholder="Senha">
        <div class="invalid-feedback">
            {{$errors->first('password')}}
        </div>
    </div>

    <div class="form-group">
        <input id="password_confirmation" name="password_confirmation"
            class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Repita a senha">
    </div>

    <div>
        <input id="phone" name="phone" class="form-control  @error('phone') is-invalid @enderror" type="text"
            value="{{old('phone')}}" placeholder="Celular para contato" maxlength="14">
        <div class="invalid-feedback">
            {{$errors->first('phone')}}
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
