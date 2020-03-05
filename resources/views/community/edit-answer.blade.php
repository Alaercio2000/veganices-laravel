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

        <div class="container mt-5 answer-form">
            <div>
                <form method="POST" action="{{route('answer.update', $post['id'])}}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="parent_id" value="{{$post['parent_id']}}">
                    <input type="hidden" name="type" value="1">
                    <input type="hidden" name="title" value="{{$post['title']}}">
                    
                    <div class="form-group">
                        <label for="corpo"></label>
                        <textarea class="form-control bodyfield @error('content') is-invalid @enderror" name="content" id="content" rows="10">{{$post['content']}}</textarea>
                        <div class="invalid-feedback">
                            {{$errors->first('content')}}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary d-flex ml-auto mb-3">Publicar resposta</button>
                </form>
            </div>
        </div>

    @endsection

    @section('js')
        <script src="https://cdn.tiny.cloud/1/nw92m4glyqmatdeftsi104kh1e3jrv6j06325f26zpl8ys6v/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

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
    @endsection