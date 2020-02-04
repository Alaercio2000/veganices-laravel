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
        <input type="text" name="cnpj" id="cnpj" class="form-control @error('cnpj') is-invalid @enderror" placeholder="Digite o CNPJ" value="{{old('cnpj')}}">

        @if(Session::has('cnpj'))
        <div class="invalid-feedback">
            {{Session::get('cnpj')}}
        </div>
        @else
        <div class="invalid-feedback">
            CNPJ Inválido
        </div>
        @endif
    </div>

    <div class="form-group">
        <input class="btn btn-success w-100 mt-3" type="submit" value="Prosseguir">
    </div>

    <h6 class="py-2 text-secondary">
        Não é Profissional?
        <a href="{{route('register')}}"> Cadastrar-se</a>
    </h6>
</form>

@endsection
