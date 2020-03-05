@extends('layouts.template')

    @section('title','Editar Post')

    @section('css')
        <link rel="stylesheet" href="{{asset('assets/css/community/style.css')}}">
    @endsection

    @section('content')

        <div class="banner">
            <img class="bannerImg" src="{{asset('assets/img/recipes/banner.jpg')}}" />
            <div class="container">
            </div>
        </div>

        <div class="container mt-5">
            <div class="">
                <form method="POST" action="{{route('community.update', $post['id'])}}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="parent_id" value="0">
                    <input type="hidden" name="type" value="0">

                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Digite aqui sua pergunta" value="{{$post['title']}}">
                        <div class="invalid-feedback">
                            {{$errors->first('title')}}
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="content">Corpo</label>
                        <textarea class="form-control bodyfield @error('content') is-invalid @enderror" name="content" id="content" rows="10">{{$post['content']}}</textarea>
                        <div class="invalid-feedback">
                            {{$errors->first('content')}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="tags" placeholder="Ex.: receitas, ajuda, duvida" value="{{$post['slug']}}">
                        <div class="invalid-feedback">
                            {{$errors->first('slug')}}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mb-5">Salvar</button>
                </form>
            </div>
        </div>

    @endsection

    @section('js')
        <script src="https://cdn.tiny.cloud/1/nw92m4glyqmatdeftsi104kh1e3jrv6j06325f26zpl8ys6v/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

        <script>
            $(document).ready(function(){
                tinymce.init({
                    selector:'textarea.bodyfield',
                    height:800,
                    menubar:false,
                    plugins:['link', 'table', 'image', 'autoresize' , 'lists'],
                    toolbar:'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table | link image | bullist numlist',
                    
                    images_upload_credentials:true,
                    convert_urls:false
                });
            });
        </script>
    @endsection