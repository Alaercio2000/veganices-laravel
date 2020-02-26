@extends('layouts.template')

@section('title','Pagamento')

@section('js')
<script src="{{asset('assets/js/cart/confirmation.js')}}"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/cart/confirmation.css')}}">
@endsection

@section('body')
style="background-color: rgb(250,250,250)"
onload="showCard()"
@endsection

@section('content')

<div class="container mt-5 pt-5">

    <div class="row py-3" style="background-color: #fff">

        <div class="col-md-6 border-right">
            <h5 class="text-secondary pb-2">Endereço de entrega</h5>
            @if (empty($address))

            <div class="py-3">
                Você não tem endereço cadastrado
            </div>

            <a href="{{route('address.create')}}">Adicionar</a>
            @else

            @php
            echo "<script>
                var zip_code ='" . $address->zip_code . "'
            </script>";
            @endphp

            <div class="pb-2">
                {{$address->recipient}}<br>
                <span class="text-secondary">{{$address->street}}, {{$address->number}},
                    {{$address->complement}}</span><br>
                <span class="text-secondary">{{$address->neighborhood}}</span><br>
                <span class="text-secondary">{{$address->county}} - {{$state->state}}</span><br><br>

                <a data-target="#modal-alter-address" data-toggle="modal" href="#">Alterar endereço de entrega</a>
            </div>
            <div class="pb-4" id="answerShipping">

            </div>
            @endif
        </div>

        @php
        $valueProductsAll = 0;
        $productsAll = 0;
        @endphp

        <div class="modal fade" id="modal-products" tabindex="-1" role="dialog" aria-labelledby="modal-products-label"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span style="font-size:50px" aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="text-secondary mb-5">Resumo da sua compra</h4>
                        @foreach ($cart as $item)
                        @php
                        $product = $item->recipe()->first();
                        $creator = $product->provider()->first();

                        $valueProducts = $product->price*$item->quantity;
                        $valueProductsAll = $valueProductsAll+$valueProducts;
                        $productsAll = $productsAll + $item->quantity;
                        @endphp
                        <div class="card mt-2" style="max-width: 900px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img style="object-fit: cover" class="card-img"
                                        src="{{asset('app/imageRecipes/'.$product->image)}}" alt="Imagem da receita">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div class="pb-2">
                                            <span class="font-weight-bold">Nome:</span>
                                            {{$product->name}}
                                        </div>
                                        <div class="pb-2">
                                            <span class="font-weight-bold">Qtd:</span>
                                            {{$item->quantity}}
                                        </div>
                                        <div class="pb-2">
                                            <span class="font-weight-bold">Preço:</span>
                                            R$ {{str_replace('.',',',$product->price)}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0" style="background-color: #f8f8f8">
                <div class="card-body">
                    <div class="text-secondary" style="font-size: 20px">
                        Resumo do pedido
                    </div>
                    <div class="pt-3 text-secondary d-flex justify-content-between">
                        <span>{{$productsAll}} produtos <a href="#" data-target="#modal-products"
                                data-toggle="modal">visualizar</a></span>
                        <span>R$ {{str_replace('.',',',$valueProductsAll)}}</span>
                    </div>
                    <div class="pt-3 text-secondary d-flex justify-content-between">
                        <span>frete</span>
                        <span id="valueShipping">-</span>
                    </div>
                    <hr>

                    <div class="d-flex justify-content-between" style="font-size: 20px">

                        @php
                        echo '<script>
                            var valueAllProducts ='.$valueProductsAll.'
                        </script>';
                        @endphp
                        <span class="font-weight-bolder">Total</span>
                        <span class="font-weight-bolder">R$ <span
                                id="valueAllProducts">{{str_replace('.',',',$valueProductsAll)}}</span></span>
                    </div>
                    <div class="text-secondary float-right pb-3">em até 12 x sem juros</div>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-4 py-3 px-4" style="background-color: #fff">
        <h5 class="text-secondary">Formas de pagamento</h5>
        <div class="col-12 d-flex justify-content-around">
            <div>
                <a id="iconCard" href="javascript:void('')" onClick="showCard()" style="text-decoration: none">
                    <i class="material-icons" style="font-size:80px">
                        credit_card
                    </i>
                    <div class="ml-n3">Cartão de Crédito</div>
                </a>
            </div>
            <div>
                <a id="iconBillet" href="javascript:void('')" onClick="showBillet()" style="text-decoration: none">
                    <i class="fas fa-barcode" style="font-size:80px"></i>
                    <div class="ml-3">Boleto</div>
                </a>
            </div>
        </div>

        <div id="formCard" class="col-12 my-4 py-3 d-none" style="background-color: #eee">
            <form method="get" class="form-horizontal">

                <div class="form-group row mt-4">
                    <label for="numberCard" class="col-3">Número do cartão</label>
                    <input type="text" name="numberCard" id="numberCard" class="form-control col-8 col-md-6">
                </div>

                <div class="form-group row mt-4">
                    <label for="nameCard" class="col-3">Nome impresso no cartão</label>
                    <input type="text" name="nameCard" id="nameCard" class="form-control col-8 col-md-6">
                </div>

                <div class="form-group row mt-4">
                    <label for="validityCard" class="col-3">Validade</label>
                    <input type="month" name="validityCard" id="validityCard" class="form-control col-8 col-md-6">
                </div>

                <div class="form-group row mt-4">
                    <label for="cvvCard" class="col-3">CVV</label>
                    <input type="text" name="cvvCard" id="cvvCard" class="form-control col-8 col-md-6">
                </div>

                <div class="form-group row my-4">
                    <label for="plots" class="col-3">Parcelar em</label>
                    <select name="plots" id="plots" class="form-control col-8 col-md-6">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>

                <div class="text-center">
                    <button class="btn btn-success" type="submit">Pagar com o cartão</button>
                </div>
            </form>
        </div>

        <div id="formBillet" class="col-12 my-4 py-3 d-none">
            <hr>
            <div>
                <p>Imprima o boleto e pague no banco</p>
                <p>ou pague pela internet utilizando o código de barras do boleto</p>
                <p>o prazo de validade do boleto é de 1 dia útil</p>
            </div>
            <div class="text-center mt-5">
                <span style="font-size: 25px" class="text-secondary">R$ <span id="valueBillet"
                        class="mr-5"></span></span>
                <button class="btn btn-success">Pagar com boleto</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-alter-address" tabindex="-1" role="dialog"
        aria-labelledby="modal-alter-address-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="py-3">Escolhar o endereço de entrega</h4>
                    <form action="{{route('cart.alter.address')}}" method="post">
                        @csrf
                        @method('PUT')
                        @foreach ($addresses as $item)
                        <div class="border py-3 mb-1 px-3">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="address{{$item->id}}" name="address_delivery"
                                    class="custom-control-input" value="{{$item->id}}"
                                    {{($address->zip_code == $item->zip_code)?'checked':''}}>
                                <label class="custom-control-label" for="address{{$item->id}}">
                                    {{$item->recipient}}<br>
                                    <span>{{$item->street}}, {{$item->number}},
                                        {{$item->complement}} - {{$item->neighborhood}}</span><br>
                                    <span>{{$item->county}} - {{$item->zip_code}}</span>
                                </label>
                            </div>
                        </div>
                        @endforeach
                        <div class="d-flex justify-content-between mt-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-success">Confirmar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
