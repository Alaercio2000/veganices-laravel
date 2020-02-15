@extends('layouts.template')

@section('title','Adicionar Endereço')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/address/style.css')}}">
@endsection

@section('js')
<script src="{{asset('assets/js/address/script.js')}}"></script>
@endsection

@section('body')
onload="selectedState('{{$address->state}}')"
@endsection

@section('content')

<div class="container">
    <main id="corpo">
        <h1 class="text-center py-3">Adicionar endereço</h1>


        <div class="card border-0">
            <form action="{{route('address.update',['address' => $address->id])}}" method="post" class="col-md-8 offset-md-2 form-horizontal">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label class="col-4 col-lg-3 pt-1" for="title">Titulo</label>
                    <input id="title" name="title" type="text" class="form-control col @error('title') is-invalid @enderror" value="{{$address->title}}">
                    <div class="invalid-feedback offset-lg-3 offset-4">
                        {{$errors->first('title')}}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-4 col-lg-3 pt-1" for="zip_code">Cep</label>
                    <input id="zip_code" name="zip_code" type="text" class="form-control col @error('zip_code') is-invalid @enderror" value="{{$address->zip_code}}">
                    <div class="invalid-feedback offset-lg-3 offset-4">
                        {{$errors->first('zip_code')}}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-4 col-lg-3 pt-1" for="street">Rua</label>
                    <input id="street" name="street" type="text" class="form-control col @error('street') is-invalid @enderror" value="{{$address->street}}">
                    <div class="invalid-feedback offset-lg-3 offset-4">
                        {{$errors->first('street')}}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-4 col-lg-3 pt-1" for="neighborhood">Bairro</label>
                    <input id="neighborhood" name="neighborhood" type="text" class="form-control col @error('neighborhood') is-invalid @enderror"
                        value="{{$address->neighborhood}}">
                        <div class="invalid-feedback offset-lg-3 offset-4">
                            {{$errors->first('neighborhood')}}
                        </div>
                </div>

                <div class="form-group row">
                    <label class="col-4 col-lg-3 pt-1" for="">Número</label>
                    <input id="number" name="number" type="text" class="form-control col @error('number') is-invalid @enderror" value="{{$address->number}}">
                    <div class="invalid-feedback offset-lg-3 offset-4">
                        {{$errors->first('number')}}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-4 col-lg-3 pt-1" for="complement">Complemento</label>
                    <input id="complement" name="complement" type="text" class="form-control col @error('complement') is-invalid @enderror"
                        value="{{$address->complement}}">
                        <div class="invalid-feedback offset-lg-3 offset-4">
                            {{$errors->first('complement')}}
                        </div>
                </div>

                <div class="form-group row">
                    <label class="col-4 col-lg-3 pt-1" for="">Cidade</label>
                    <input id="county" name="county" type="text" class="form-control col @error('county') is-invalid @enderror" value="{{$address->county}}">
                    <div class="invalid-feedback offset-lg-3 offset-4">
                        {{$errors->first('county')}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-4 col-lg-3 pt-1" for="state">Estado</label>
                    <select id="state" name="state" class="form-control col @error('state') is-invalid @enderror">
                        <option value=""></option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                    <div class="invalid-feedback offset-lg-3 offset-4">
                        {{$errors->first('state')}}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-4 col-lg-3" for=""></label>
                    <input type="submit" value="Adicionar" class="btn btn-success col my-3 w-100">
                </div>
            </form>
        </div>
    </main>
</div>

@endsection
