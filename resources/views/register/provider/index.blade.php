@extends('layouts.auth')

@section('title','Cadastro Profissional')

@section('js')
<script src="{{asset('assets/js/register/provider/script.js')}}"></script>
@endsection

@section('content')

<h3 class="text-center font-weight-normal py-3">Cadastro Profissional</h3>

<form method="POST" class="p-3">
    @csrf

    <div class="form-group">
        <label class="text-secondary label-form" for="cnpj">CNPJ</label>
        <input type="text" name="cnpj" id="cnpj"
            class="form-control @error('cnpj') is-invalid @enderror @if(session('cnpj')) is-invalid @endif"
            placeholder="Digite o CNPJ..." value="{{old('cnpj')}}">
        <div class="invalid-feedback">
            {{$errors->first('cnpj')}}
            @if(session('cnpj'))
            {{session('cnpj')}}
            @endif
        </div>
    </div>

    <div class="form-group">
            <label class="text-secondary label-form" for="email">E-mail</label>
        <input type="text" name="email" id="email"
            class="form-control @error('email') is-invalid @enderror"
            placeholder="Digite o email de acesso..." value="{{old('email')}}">
        <div class="invalid-feedback">
            {{$errors->first('email')}}
        </div>
    </div>

    <div class="form-group">
            <label class="text-secondary label-form" for="password">Senha</label>
        <input id="password" name="password" class="form-control @error('password') is-invalid @enderror"
            type="password" placeholder="Difite sua senha...">
        <div class="invalid-feedback">
            {{$errors->first('password')}}
        </div>
    </div>

    <div class="form-group">
            <label class="text-secondary label-form" for="cnpj">Confirme sua senha</label>
        <input id="password_confirmation" name="password_confirmation"
            class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Repita a senha">
    </div>

    <div  class="form-group">
            <label class="text-secondary label-form" for="phone">Telefone</label>
        <input id="phone" name="phone" class="form-control  @error('phone') is-invalid @enderror" type="text"
            value="{{old('phone')}}" placeholder="Telefone para contato" maxlength="14">
        <div class="invalid-feedback">
            {{$errors->first('phone')}}
        </div>
    </div>

    <div  class="form-group">
            <label class="text-secondary label-form" for="date_opening">Data de abertura</label>
        <input id="date_opening" name="date_opening"
            class="form-control  @error('date_opening') is-invalid @enderror @if(session('date_opening')) is-invalid @endif"
            type="date" value="{{old('date_opening')}}" placeholder="Data de abertura da empresa" maxlength="14">
        <div class="invalid-feedback">
            {{$errors->first('date_opening')}}
            @if(session('date_opening'))
            {{session('date_opening')}}
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
