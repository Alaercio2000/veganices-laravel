    @extends('layouts.template')

    @section('title','Comunidade')

    @section('css')
        <link rel="stylesheet" href="{{asset('assets/css/community/style.css')}}">
    @endsection

    @section('content')

        <div class="banner">
            <img class="bannerImg" src="{{asset('assets/img/recipes/banner.jpg')}}" />
            <div class="container">
            </div>
        </div>

        <div class="container">
            <div class="post border-bottom pb-5">
                <div class="row">
                    <div class=" row col-lg-2">
                        <a class="linkComunidadecor" href="#">
                            <img src="{{asset('app/avatar/' . $post['user']['avatar'])}}" alt="{{$post['user']['avatar']}}" class="img-thumbnail  rounded-circle imgUsuarioRedonda ml-2 shadow ">
                        </a>
                    </div>
                    <div class="col-lg-10">
                        <div class="mb-2">
                            <h4><strong>{{$post['title']}}</strong></h4>
                        </div>
                        <div class="mb-2">
                            <a href="#" style="text-decoration: none" class="LinksForunUsuario">
                                <strong>‎{{$post['user']['name']}}</strong>
                            </a>
                            <small class=" text-muted">em</small>
                            <small class="text-muted">{{$post['date']}}</small>
                        </div>
                        <div class="mb-2">
                            {!!$post['content']!!}
                        </div>
                    </div>
                </div>
            </div>

            @include('community.create-answer')

            <h3 class="mt-4 pt-3 answer-block border-top">Respostas</h3>
            
            @if(empty($answers))
                <div class="answer border-bottom">
                    <div class="row pb-4 mt-5 col-lg-10 mb-2">
                        Nenhuma resposta encontrada
                    </div>
                </div>
            @else 
                @foreach($answers as $answer)
                <div class="answer border-bottom">
                    <div class="row pb-4 mt-5">
                        <div class=" row col-lg-2">
                            <a class="linkComunidadecor" href="#">
                                <img src="{{asset('app/avatar/' . $answer['user']['avatar'])}}" alt="alt="{{$answer['user']['avatar']}}" class="img-thumbnail  rounded-circle imgUsuarioRedonda ml-2 shadow ">
                            </a>
                        </div>
                        <div class="col-lg-10">
                            <div class="mb-2">
                                <a href="#" style="text-decoration: none" class="LinksForunUsuario">
                                    <strong>‎{{$answer['user']['name']}}</strong>
                                </a>
                                <small class=" text-muted">em</small>
                                <small class="text-muted">{{$answer['date']}}</small>
                            </div>
                            <div class="mb-2">
                                {!!$answer['content']!!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        @endsection

    @section('js')
        <script src="https://cdn.tiny.cloud/1/nw92m4glyqmatdeftsi104kh1e3jrv6j06325f26zpl8ys6v/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <script>
            tinymce.init({
                selector:'textarea.bodyfield',
                height:800,
                menubar:false,
                plugins:['link', 'table', 'image', 'autoresize' , 'lists'],
                toolbar:'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table | link image | bullist numlist',
                
                images_upload_credentials:true,
                convert_urls:false
            });
        </script>

        <script src="{{asset('assets/js/community/create.js')}}"></script>
    @endsection
        