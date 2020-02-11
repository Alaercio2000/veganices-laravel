@extends('layouts.template')

@section('title','Endereços do Usuário')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/address/style.css')}}">
@endsection

@section('content')

<div class="container">
    <main id="corpo">
        <h1 class="text-center py-2">Endereços</h1>
        @if(!empty($addresses->all()))
        @foreach($addresses as $address)
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <h3 class="pl-3">{{$address->title}}</h3>
                        <form action="{{route('address.destroy',['address' => $address->id])}}" method="post" onSubmit="return confirm('Você tem certeza que deseja excluir esse endereço ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="iconAction btn btn-danger" title="Deletar">
                                <i class="material-icons">
                                    clear
                                </i>
                            </button>
                        </form>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="pl-3">
                            Cep : {{str_replace('.','',$address->cep)}}<br>
                            Município : {{$address->county}}<br>
                            Baiiro : {{$address->neighborhood}}<br>
                            Rua : {{$address->street}}<br>
                            Número : {{$address->number}}<br>
                            Complemento : {{$address->complement}}<br>
                        </div>
                        <div>
                            <a href="{{route('address.edit',['address' => $address->id])}}"
                                class="iconAction btn btn-warning text-light" title="Editar">
                                <i class="material-icons">
                                    create
                                </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div>
            <h2 class="text-center pt-5">Você não tem nenhum endereço cadastrado</h2>
        </div>
        @endif

        <div class="text-center my-5">
            <a href="{{route('address.create')}}" class="btn btn-success">Adicionar</a>
        </div>
    </main>
</div>

@endsection
