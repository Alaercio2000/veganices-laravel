@extends('layouts.template')

@section('title','Carrinho')

@section('content')

<div class="container">

    <h2 class="pt-5 mt-5">Meu Carrinho</h2>

    @if(!empty($cart->all()))

    <table class="table col-lg-8 border-0">
        <thead>
            <tr>
                <th class="border-top-0">
                    produto
                </th>
                <th class="border-top-0">
                    qtd.
                </th>
                <th class="border-top-0">
                    preço
                </th>
            </tr>
        </thead>
        @foreach ($cart->all() as $item)
        @php
        $product = $item->recipe()->first();
        $creator = $product->provider()->first();
        @endphp
        <tr>
            <td>
                <div class="d-flex">
                    <div>
                        <a href="{{route('user.recipe.show',$product->id)}}">
                            <img height="80" width="80" style="object-fit:cover"
                                src="{{asset('app/imageRecipes/'.$product->image)}}" alt="Imagem do produto">
                        </a>
                    </div>
                    <div class="mt-n2">
                        <span class="pl-3 text-secondary font-weight-bolder">{{$product->name}}</span>
                        <div class="mt-4 pl-3 text-secondary">
                            vendido por <span style="font-weight:600;font-size:14px">{{$creator->name}}</span>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <form action="{{route('cart.update.quantity',$item->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <select name="quantity" id="quantity" class="form-control w-75" onChange="this.form.submit()">
                        @for ($i = 0; $i <= $product->stock; $i++)
                            <option {{($item->quantity == $i)?'selected':''}} class="form-control" value="{{$i}}"
                                label="{{$i}}"></option>
                            @endfor
                    </select>
                </form>
                <form action="{{route('cart.destroy',$item->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-link text-secondary p-0 d-none d-lg-inline-block pl-lg-2">remover</button>
                </form>
            </td>
            <td>
                R${{$product->price*$item->quantity}}
            </td>
        </tr>
        @endforeach
    </table>

    @else
    <div style="height:200px" class="border text-center mt-4">
        <h3 class="pt-4">Seu carrinho está vazio</h3>
        <div class="pt-2">
            <a class="btn btn-link text-secondary" href="{{route('home.index')}}">Voltar para página inicial</a>ou
            <a class="btn btn-link text-secondary" href="{{route('user.recipes')}}">escolhar outras receitas</a>
        </div>
    </div>
    @endif

</div>
@endsection
