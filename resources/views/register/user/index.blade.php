@extends('layouts.template-auth')

@section('title','Cadatro de Usuário')

@section('description')
<h3 class="text-center font-weight-normal pb-3">Crie sua conta</h3>
@endsection

@section('content')
<form method="post" class="p-3">
    <div class="form-group">
        <input type="text" class="form-control" name="name" id="name" placeholder="Nome">
    </div>
    <div class="form-group">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" id="password" placeholder="Senha">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Repita sua senha">
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Cadastrar</button>
    </div>
    <h6>
        Já tem cadastro?
        <a href="{{route('login')}}">Entrar</a>
    </h6>
</form>
@endsection
