@extends('layouts.template')

@section('title','Adicionar Endereço')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/address/style.css')}}">
@endsection

@section('content')

<div class="container">
    <main id="corpo">
        <h1 class="text-center py-3">Adicionar endereço</h1>


        <div class="card border-0">
            <form action="{{route('address.store')}}" method="post" class="col-md-8 offset-md-2 form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-2" for="title">Titulo</label>
                    <input id="title" name="title" type="text" class="form-control col-10">
                </div>

                <div class="form-group row">
                    <label class="col-2" for="cep">Cep</label>
                    <input id="cep" name="cep" type="text" class="form-control col-10">
                </div>

                <div class="form-group row">
                    <label class="col-2" for="street">Rua</label>
                    <input id="street" name="street" type="text" class="form-control col-10">
                </div>

                <div class="form-group row">
                    <label class="col-2" for="neighborhood">Bairro</label>
                    <input id="neighborhood" name="neighborhood" type="text" class="form-control col-10">
                </div>

                <div class="form-group row">
                    <label class="col-2" for="">Número</label>
                    <input id="number" name="number" type="text" class="form-control col-10">
                </div>

                <div class="form-group row">
                        <label class="col-2" for="">Cidade</label>
                        <input id="county" name="county" type="text" class="form-control col-10">
                </div>

                <div class="form-group row">
                    <label class="col-2" for="">Estado</label>
                    <input id="uf" name="uf" type="text" class="form-control col-10">
                </div>

                <div class="form-group">
                        <input type="submit" value="Adicionar" class="btn btn-success w-100">
                </div>
            </form>
        </div>
    </main>
</div>

@endsection
