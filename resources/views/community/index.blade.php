
    @extends('layouts.template')

    @section('title','Comunidade')

    @section('css')
        <link rel="stylesheet" href="{{asset('assets/css/community/style.css')}}">
    @endsection

    @section('content')
    <div class="banner">
        <img class="bannerImg" src="{{asset('assets/img/recipes/banner.jpg')}}" />
        <div class="container searchBlock">
            <div class="col-lg  ">
                <h2 class="text-center font-weight-bold "> Comunidade </h2>
                <p class="text-justify text-center"> 
                    Compartilhe e resolva suas dúvidas com a ajuda de outros veganos
                </p>
            </div>
            <div class="row">
                <div class="input-group mb-3 searchInput">
                    <input type="text" class="form-control" placeholder="O que procura? " aria-label=" " aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="button-addon2">Pesquisar</button>
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

    <div class="carouselcol mt-5 mb-5">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class=" imgComunidade">
                    <a href="#" class="text-decoration-none">
                        <div class="backgroundLinkimg  d-flex align-items-center justify-content-center rounded">
                            <h2>Primeiros passos</h2>
                        </div>
                    </a>
                </div>
                <div class="imgComunidade">
                    <a href="#" class="text-decoration-none">
                        <div class="backgroundLinkimg  d-flex align-items-center justify-content-center rounded">
                            <h2>Dificuldades</h2>
                        </div>
                    </a>
                </div>
                <div class="imgComunidade">
                    <a href="#" class="text-decoration-none">
                        <div class="backgroundLinkimg  d-flex align-items-center justify-content-center rounded">
                            <h2>Alimentação</h2>
                        </div>
                    </a>
                </div>
                <div class="imgComunidade">
                    <a href="#" class="text-decoration-none">
                        <div class="backgroundLinkimg  d-flex align-items-center justify-content-center rounded">
                            <h2>Produtos Caseiros</h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @foreach($communityPosts as $communityPost)
        <div class="container mt-5 ">
            <div class="row">
                <div class="col-lg ">
                    <div class="row border-bottom pb-4 mt-5">
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

    <div class="container d-flex justify-content-center mt-5 ">
        <div>
            <nav aria-label="Page navigation example ">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>



    </div>

    @endsection


