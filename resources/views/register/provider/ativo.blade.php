@extends('layouts.auth')

@section('title','Cadastro Profissional')

@section('css')

@endsection

@section('js')
<script>
    $("#phone").mask("(00) 00000-0000");
</script>
@endsection

@section('content')
<h3 class="text-center font-weight-normal py-3">Cadastro Profissional</h3>
<form action="{{route('register.ativo')}}" method="POST" class="p-3">
    @csrf

    <div class="form-group">
        <input id="cnpj" name="cnpj" class="form-control" type="text" value="{{$cnpj}}" disabled>
    </div>

    <div class="form-group">
        <input id="name" name="name" class="form-control" type="text" value="{{$name}}" disabled>
    </div>

    <div class="form-group">
        <input id="password" name="password" class="form-control @error('password') is-invalid @enderror" type="text"
            placeholder="Senha">
    </div>

    <div class="form-group">
        <input id="password_confirmation" name="password_confirmation"
            class="form-control @error('password') is-invalid @enderror" type="text" placeholder="Repita a senha">
    </div>

    <div>
        <input id="phone" name="phone" class="form-control" type="text" value="{{old('phone')}}"
            placeholder="Celular para contato" maxlength="14">
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
