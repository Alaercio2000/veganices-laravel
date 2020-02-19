@extends('layouts.template')

  @section('title','Nova Receita')

  @section('content')

  <link rel="stylesheet" href="{{asset('assets/css/recipes/style.css')}}">

  <div class="banner">
    <img class="bannerImg" src="{{asset('assets/img/recipes/banner.jpg')}}" />
    </div>
    <div class="row justify-content-center">
    <div class="col-5">
    <h3 class="text-center font-weight-normal py-3">Cadastro de nova receita</h3>

<form action="{{route('recipes.store')}}" method="post" class="p-3" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
            placeholder="Nome" value="{{old('name')}}">
        <div class="invalid-feedback">
            {{$errors->first('name')}}
        </div>
    </div>

    <div class="form-group">
        <textarea class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" id="ingredients"
            placeholder="Ingredientes">{{old('ingredients')}}</textarea>
        <div class="invalid-feedback">
            {{$errors->first('ingredients')}}
        </div>
    </div>

    <div class="form-group">
        <textarea  class="form-control @error('preparation_method') is-invalid @enderror" name="preparation_method"
            id="preparation_method" placeholder="Modo de Preparo">{{old('ingredients')}}</textarea>
        <div class="invalid-feedback">
            {{$errors->first('preparation_method')}}
        </div>
    </div>

    <div class="form-group">
        <select  class="form-control @error('category_recipes_id') is-invalid @enderror" name="category_recipes_id"
            id="category_recipes_id">
            <option value="" onselect>Categoria</option>
            @foreach ($categoryRecipes as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            {{$errors->first('category_recipes_id')}}
        </div>
    </div>

    <div class="form-group">
        <input type="file" class="form-control @error('image') is-invalid @enderror" name="imageRecipe"
            id="imageRecipe">
            <div class="invalid-feedback">
                {{$errors->first('imageRecipe')}}
            </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success w-100">Cadastrar</button>
    </div>
</form>

      </div>
    </div>
  </div>
  </div>


  @endSection

