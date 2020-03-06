    @extends('layouts.template')

    @section('title','Post')

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
                        <div class="mb-2 d-flex justify-content-between">
                            <h4><strong>{{$post['title']}}</strong></h4>
                            @if($post['user_id'] == $userId)
                                <div>
                                    <a href="{{route('community.edit',$post['id'])}}" 
                                        data-toggle="tooltip" data-placement="bottom" title="Editar"
                                    >
                                        <i class="far fa-edit fa-1x" style="font-size: 20px"></i>
                                    </a>
    
                                    <a href="javascript:void()" 
                                        id="{{$post['id']}}" 
                                        data-toggle="modal" 
                                        data-target="#exampleModal"
                                        class="delete"
                                        data-toggle="tooltip" data-placement="left" title="Excluir"
                                    >
                                        <i class="far fa-times-circle text-danger" style="font-size: 20px"></i>
                                    </a>
                                        
                                    <form 
                                        action="{{route('community.destroy', $post['id'])}}" 
                                        method="POST"
                                        enctype="multipart/form-data" 
                                        id="delete-post-{{$post['id']}}"
                                    >
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            @endif
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
                        <div class="mt-5">
                            @foreach($tags as $tag)
                                <a href="/community/list/{{$tag['slug']}}" class="badge badge-secondary">{{$tag['slug']}}</a>
                            @endforeach
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

                            <div class="mt-5">
                                @if($answer['user_id'] == $userId)
                                    <div class="mt-5">
                                        <a href="{{route('answer.edit',$answer['id'])}}">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <a href="javascript:void()" 
                                            id="{{$answer['id']}}" 
                                            data-toggle="modal" 
                                            data-target="#exampleModal"
                                            class="delete"
                                        >
                                            <i class="far fa-times-circle text-danger"></i>
                                        </a>
                                            
                                        <form 
                                            action="{{route('answer.destroy', $answer['id'])}}" 
                                            method="POST" 
                                            enctype="multipart/form-data" 
                                            id="delete-post-{{$answer['id']}}"                                        
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="parent_id" value="{{$answer['parent_id']}}">
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="d-flex justify-content-center mb-4">
                    {!! $links !!}
                </div>
            @endif
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apagar Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja apagar esse post?
                        <input type="hidden" id="to-delete">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                        <button type="button" class="btn btn-primary" id="deleteYes">Sim</button>
                    </div>
                </div>
            </div>
        </div>

    @endsection

    @section('js')
        <script src="https://cdn.tiny.cloud/1/nw92m4glyqmatdeftsi104kh1e3jrv6j06325f26zpl8ys6v/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <script>
            tinymce.init({
                selector:'textarea.bodyfield',
                height:800,
                menubar:false,
                plugins:['link', 'table', 'autoresize' , 'lists'],
                toolbar:'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table | link | bullist numlist',
                
                images_upload_credentials:true,
                convert_urls:false
            });
        </script>

        <script src="{{asset('assets/js/community/show.js')}}"></script>

        <script>  
            $(document).ready(function(){
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                })
            })
        </script>

    @endsection
        