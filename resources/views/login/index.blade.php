@extends('layouts.template-auth')

@section('title','login')

@section('description')
    <h4 class="mb-3 font-weight-normal text-center">Entrar Em Veganices</h4>
@endsection

@section('content')

<form method="post" class="p-3">
    <div class="form-group">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" id="password" placeholder="Senha">
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Acessar</button>
    </div>
    <h6>
        Não tem cadastro?
    <a href="{{route('register')}}">Cadastra-se</a>
    </h6>
</form>

@endsection
