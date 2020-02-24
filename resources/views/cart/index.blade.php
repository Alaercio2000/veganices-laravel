@extends('layouts.template')

@section('title','Carrinho')

@section('js')
<script src="{{asset('assets/js/cart/script.js')}}"></script>
@endsection

@section('content')

<div class="container-fluid">

    <h2 class="pt-5 mt-5">Meu Carrinho</h2>

    <div class="row">
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
            @php
            $valueProductsAll = 0;
            $productsAll = 0;
            @endphp
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
                            @php
                            if($product->stock > 10){
                            $counter = 10;
                            }else{
                            $counter = $product->stock;
                            }
                            @endphp
                            @for ($i = 0; $i <= $counter; $i++) <option {{($item->quantity == $i)?'selected':''}}
                                class="form-control" value="{{$i}}" label="{{$i}}">
                                </option>
                                @endfor
                        </select>
                    </form>
                    <form action="{{route('cart.destroy',$item->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button
                            class="btn btn-link text-secondary p-0 d-none d-lg-inline-block pl-lg-2">remover</button>
                    </form>
                </td>
                <td>
                    R$
                    @php
                        $valueProducts = $product->price*$item->quantity;
                        echo (str_replace('.',',',$valueProducts));
                    @endphp
                </td>
            </tr>
            @php
            $valueProductsAll = $valueProductsAll+$valueProducts;
            $productsAll = $productsAll + $item->quantity;
            @endphp
            @endforeach
        </table>

        <div class="col-lg-4">
            <div class="card border-0" style="background-color:#f8f8f8">
                <div class="card-body">
                    <div class="font-weight-bolder" style="font-size: 20px">
                        resumo do pedido
                    </div>
                    <div class="pt-3 text-secondary d-flex justify-content-between">
                        <span>{{$productsAll}} produtos</span>
                        <span>R$ {{str_replace('.',',',$valueProductsAll)}}</span>
                    </div>
                    <div class="pt-3 text-secondary d-flex justify-content-between">
                        <span>frete</span>
                        <span>-</span>
                    </div>
                    <hr>

                    <div class="d-flex justify-content-between" style="font-size: 20px">
                        <span class="font-weight-bolder">total de</span>
                        <span class="font-weight-bolder">R$ {{str_replace('.',',',$valueProductsAll)}}</span>
                    </div>
                    <div class="text-secondary float-right pb-2">em até 12 x sem juros</div><br>
                    <hr>
                    <div>
                        <button
                            class="btn btn-warning w-100 d-flex justify-content-lg-center align-items-center text-light font-weight-bolder py-2">
                            <i class="material-icons mt-1">
                                shopping_basket
                            </i>
                            <span style="font-size:20px" class="ml-2">
                                continuar
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-center my-5">
        <label for="zipCodeSource" class="pr-3">calcular frete e prazo</label>
        <div class="col-2">
            <input class="form-control" type="text" id="zipCodeSource" name="zipCodeSource" placeholder="Ex: 12345-678">
        </div>
        <button class="btn btn-info ml-3" onClick="calcShipping()">Calcular</button>
    </div>
</div>

@else
<div style="height:200px" class="border text-center mt-4">
    <h3 class="pt-4">Seu carrinho está vazio</h3>
    <div class="pt-2">
        <a class="btn btn-link text-secondary" href="{{route('home.index')}}">Voltar para página inicial</a>ou
        <a class="btn btn-link text-secondary" href="{{route('user.recipes')}}">escolhar outras receitas</a>
    </div>
</div>
@endif
@endsection
