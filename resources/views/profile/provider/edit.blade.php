@extends('layouts.template')

@section('title','Editando Informações')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/profile/edit.css')}}">
@endsection

@if(session('errorPassword') || $errors->first('password') || session('errorPasswordOld'))
@section('body')
onload="showPassword()"
@endsection
@endif

@section('js')
<script src="{{asset('assets/js/profile/provider/edit.js')}}"></script>
@endsection

@section('content')

<div class="container">

    <main id="corpo">

        @if (session('success'))
        <div class="alert alert-success col-md-8 offset-md-2 mt-5">
            {{session('success')}}
        </div>
        @endif

        <h2 class="text-center pb-4">Atualizando dados</h2>

        <div class="card border-0">

            <form action="{{route('profile.provider.update',['id' => $provider->id])}}" method="post"
                class="col-md-8 offset-md-2 form-horizontal">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label class="col-4 col-lg-3 pt-1" for="name">Nome</label>
                    <input id="name" name="name" type="text"
                        class="form-control col @error('name') is-invalid @enderror" value="{{$provider->name}}">
                    <div class="invalid-feedback offset-lg-3 offset-4">
                        {{$errors->first('name')}}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-4 col-lg-3 pt-1" for="email">E-mail</label>
                    <input id="email" name="email" type="text"
                        class="form-control col @error('email') is-invalid @enderror" value="{{$user->email}}">
                    <div class="invalid-feedback offset-lg-3 offset-4">
                        {{$errors->first('email')}}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-4 col-lg-3 pt-1" for="cnpj">CNPJ</label>
                    <input id="cnpj" name="cnpj" type="text" class="form-control col @error('cnpj') is-invalid @enderror"
                        value="{{$provider->cnpj}}">
                    <div class="invalid-feedback offset-lg-3 offset-4">
                        {{$errors->first('cnpj')}}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-4 col-lg-3 pt-1" for="phone">Telefone</label>
                    <input id="phone" name="phone" type="text"
                        class="form-control col @error('phone') is-invalid @enderror" value="{{$user->phone}}">
                    <div class="invalid-feedback offset-lg-3 offset-4">
                        {{$errors->first('phone')}}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-4 col-lg-3 pt-1" for="date_opening">Data de abertura</label>
                    <input id="date_opening" name="date_opening" type="date"
                        class="form-control col @error('date_opening') is-invalid @enderror"
                        value="{{$provider->date_opening}}">
                    <div class="invalid-feedback offset-lg-3 offset-4">
                        {{$errors->first('date_opening')}}
                    </div>
                </div>

                <div class="form-group row d-none input-password">
                    <label class="col-4 col-lg-3 pt-1" for="password_old">Senha atual</label>
                    <input id="password_old" name="password_old" type="hidden"
                        class="form-control col @if(session('errorPassword')) is-invalid @endif @if(session('errorPasswordOld')) is-invalid @endif">
                    <div class="invalid-feedback offset-lg-3 offset-4">
                        @if (session('errorPassword'))
                        {{session('errorPassword')}}
                        @endif

                        @if (session('errorPasswordOld'))
                        {{session('errorPasswordOld')}}
                        @endif
                    </div>
                </div>

                <div class="form-group row d-none input-password">
                    <label class="col-4 col-lg-3 pt-1" for="">Nova senha</label>
                    <input id="password" name="password" type="hidden"
                        class="form-control col @error('password') is-invalid @enderror">
                    <div class="invalid-feedback offset-lg-3 offset-4">
                        {{$errors->first('password')}}
                    </div>
                </div>

                <div class="form-group row d-none input-password">
                    <label class="col-4 col-lg-3 pt-1" for="password_confirmation">Repita a senha</label>
                    <input id="password_confirmation" name="password_confirmation" type="hidden"
                        class="form-control col @error('password') is-invalid @enderror">
                </div>

                <div class="form-group row justify-content-end">
                    <label class="col-4 col-lg-3" for=""></label>
                    <a id="buttonShowPassword" href="javascript:void('')" onClick="showPassword()" class="btn btn-info col mr-5 mb-5">Trocar
                        senha</a>
                    <input type="submit" value="Salvar" class="btn btn-success col mb-5">
                </div>

            </form>
        </div>
    </main>
</div>

@endsection
