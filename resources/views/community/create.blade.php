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

        <div class="container mt-5">
            <div class="">
                <form method="POST" action="{{route('community.store')}}">
                    @csrf

                    <input type="hidden" name="parent_id" value="0">
                    <input type="hidden" name="type" value="0">

                    <div class="form-group">
                      <label for="titulo">Título</label>
                      <input type="text" class="form-control" name="title" id="titulo" placeholder="Digite aqui sua pergunta">
                    </div>
                
                    <div class="form-group">
                        <label for="corpo">Corpo</label>
                        <textarea class="form-control bodyfield" name="content" id="content" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <input type="text" class="form-control" name="slug" id="tags" placeholder="Digite aqui as tags">
                    </div>

                    <button type="submit" class="btn btn-primary mb-5">Enviar</button>
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
                plugins:['link', 'table', 'image', 'autoresize' , 'lists'],
                toolbar:'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table | link image | bullist numlist',
                
                images_upload_credentials:true,
                convert_urls:false
            });
        </script>
    @endsection