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
            <div class="row">
                <div class="post">
                    <div class="row">
                        <div class=" row col-lg-2">
                            <a class="linkComunidadecor" href="#">
                                <img src="http://127.0.0.1:8000/assets/img/community/mulherGato.jpg" alt="Mulher Gato" class="img-thumbnail  rounded-circle imgUsuarioRedonda ml-2 shadow ">
                            </a>
                        </div>
                        <div class="col-lg-10">
                            <div class="mb-2">
                                <h4><strong>Quero ser vegana, mas como largar os peixes!!! Minhau!!!</strong></h4>
                            </div>
                            <div class="mb-2">
                                <a href="#" style="text-decoration: none" class="LinksForunUsuario">
                                    <strong>‎Selina</strong></a>
                                <small class=" text-muted">em</small>
                                <a href="#" style="text-decoration: none" class="LinksForunUsuario"><strong> Forum
                                        Dificuldades </strong> </a>
                                <small class="text-muted"> ,Ontem as 23:50</small>
                            </div>
                            <div class="mb-2">
                                <p>
                                    veniam veritatis, ratione exercitationem, maiores possimus blanditiis voluptatum
                                    fugit odit culpa earum nobis facere et ea eius. Tempora illum quod odio?
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis magni pariatur totam modi nemo,
                                    cupiditate ab optio quaerat illo, quam tenetur, eos possimus voluptas aperiam odio rerum iste. Nobis, ea.
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem iure reiciendis facilis sit expedita 
                                    aliquam debitis facere rem, voluptas incidunt magnam sint libero quibusdam, dolor ipsa nihil eius nobis! Incidunt!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="border-bottom">
                        <button type="submit" class="btn btn-primary mb-4 d-flex ml-auto">Responder</button>
                    </div>
                </div>

                <h3 class="mt-4">Respostas</h3>
                <div class="answer border-bottom">
                    <div class="row pb-4 mt-5">
                        <div class=" row col-lg-2">
                            <a class="linkComunidadecor" href="#">
                                <img src="http://127.0.0.1:8000/assets/img/community/mulherGato.jpg" alt="Mulher Gato" class="img-thumbnail  rounded-circle imgUsuarioRedonda ml-2 shadow ">
                            </a>
                        </div>
                        <div class="col-lg-10">
                            <div class="mb-2">
                                <a href="#" style="text-decoration: none" class="LinksForunUsuario">
                                    <strong>‎Selina</strong></a>
                                <small class="text-muted"> ,Ontem as 23:50</small>
                            </div>
                            <div class="mb-2">
                                <p>
                                    veniam veritatis, ratione exercitationem, maiores possimus blanditiis voluptatum
                                    fugit odit culpa earum nobis facere et ea eius. Tempora illum quod odio?
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis magni pariatur totam modi nemo,
                                    cupiditate ab optio quaerat illo, quam tenetur, eos possimus voluptas aperiam odio rerum iste. Nobis, ea.
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem iure reiciendis facilis sit expedita 
                                    aliquam debitis facere rem, voluptas incidunt magnam sint libero quibusdam, dolor ipsa nihil eius nobis! Incidunt!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="answer border-bottom">
                    <div class="row pb-4 mt-5">
                        <div class=" row col-lg-2">
                            <a class="linkComunidadecor" href="#">
                                <img src="http://127.0.0.1:8000/assets/img/community/mulherGato.jpg" alt="Mulher Gato" class="img-thumbnail  rounded-circle imgUsuarioRedonda ml-2 shadow ">
                            </a>
                        </div>
                        <div class="col-lg-10">
                            <div class="mb-2">
                                <a href="#" style="text-decoration: none" class="LinksForunUsuario">
                                    <strong>‎Selina</strong></a>
                                <small class="text-muted"> ,Ontem as 23:50</small>
                            </div>
                            <div class="mb-2">
                                <p>
                                    veniam veritatis, ratione exercitationem, maiores possimus blanditiis voluptatum
                                    fugit odit culpa earum nobis facere et ea eius. Tempora illum quod odio?
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis magni pariatur totam modi nemo,
                                    cupiditate ab optio quaerat illo, quam tenetur, eos possimus voluptas aperiam odio rerum iste. Nobis, ea.
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem iure reiciendis facilis sit expedita 
                                    aliquam debitis facere rem, voluptas incidunt magnam sint libero quibusdam, dolor ipsa nihil eius nobis! Incidunt!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
