    @extends('layouts.template')

    @section('title','Comunidade')

    @section('css')
        <link rel="stylesheet" href="{{asset('assets/css/community/style.css')}}">
    @endsection

    @section('content')

        <div class="container corpoConteudo">
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
                        <textarea class="form-control" name="content" id="corpo" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <input type="text" class="form-control" name="slug" id="tags" placeholder="Digite aqui as tags">
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>


            </div>
        </div>

    @endsection