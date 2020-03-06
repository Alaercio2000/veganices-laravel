
    @extends('layouts.template')

    @section('title','Comunidade')

    @section('css')
        <link rel="stylesheet" href="{{asset('assets/css/community/style.css')}}">
    @endsection

    @section('content')
        <div class="banner">
            <img class="bannerImg" src="{{asset('assets/img/recipes/banner.jpg')}}" />
            <div class="container searchBlock border">
                <div class="col-lg  ">
                    <h2 class="text-center font-weight-bold "> Comunidade </h2>
                    <p class="text-justify text-center"> 
                        Compartilhe e resolva suas dúvidas com a ajuda de outros veganos
                    </p>
                </div>
                <div class="row">
                    <div class="input-group mb-3 searchInput">
                        <form action="/community/list" method="GET" id="form-slug">
                        </form>
                        <input type="text" id="slug" class="form-control" placeholder="O que procura? " aria-label=" " aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="" id="btn-slug">Pesquisar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="container corpoConteudo">
            <div class="row">
                <div class="col-lg">
                    <div class="media">
                        <div class="list-unstylied row">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container border-bottom mt-3">
            <div class="row">
                <div class="d-flex ml-auto pb-3">
                    <a href="{{route('community.create')}}" data-toggle="tooltip" data-placement="left" title="Nova Postagem">
                        <i class="far fa-plus-square fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
        @foreach($communityPosts as $communityPost)
            <div class="container my-5">
                <div class="row">
                    <div class="col-lg ">
                        <div class="row border-bottom">
                            <div class=" row col-lg-2">
                                <img src="{{asset('app/avatar/' . $communityPost['user']['avatar'])}}" alt="{{$communityPost['user']['avatar']}}" class="img-thumbnail  rounded-circle imgUsuarioRedonda ml-2 shadow ">
                            </div>
                            <div class="col-lg">
                                <div class="mb-2">
                                    <a href="/community/{{$communityPost['id']}}" style="text-decoration: none" class="LinksForunUsuario"> 
                                        <strong>{{$communityPost['title']}}</strong> 
                                    </a>
                                </div>
                                <div class="mb-2">
                                    <strong>‎{{$communityPost['user']['name']}}</strong>
                                    <small class=" text-muted">em</small>
                                    <small class="text-muted">{{$communityPost['date']}}</small>
                                </div>
                                <div class="mb-2">
                                    <a href="/community/{{$communityPost['id']}}" style="text-decoration: none" class="LinksForun">
                                        {!!substr($communityPost['content'], 0, 180)!!}
                                    </a>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-4">
                                    <small class="text-muted">{{$communityPost['totalComments']}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="d-flex justify-content-center mb-4">
            {!! $links !!}
        </div>

    @endsection

    @section('js')

        <script>  
            $(document).ready(function(){
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                })
            })
        </script>

        <script src="{{asset('assets/js/community/search.js')}}"></script>

    @endsection


