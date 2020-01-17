@extends('layouts.template')

@section('title','Cadastro')

@section('content')

    {{-- <link rel="stylesheet" href="/veganices/paginas/login/assets/css/forms.css"> --}}
    <link rel="stylesheet" href="css/css-cadastro/cadastro.css">



<main class="container text-center">

    <form action="" method="POST" class="row">

        <div class="row my-3 inner-div-form-profissional col-lg-9">

            <div class="col-lg-12">
                <h3>Cadastro Profissional</h3>
            </div>

            <div class="col-lg-12 mt-3">
                <h5>Dados de acesso</h5>
            </div>

            <div class="form-group my-3 col-lg-12">
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Usuário">
            </div>

            <div class="form-group my-3 col-lg-6">
                <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
            </div>

            <div class="form-group my-3 col-lg-6">
                <input type="password" class="form-control" name="confirmarSenha" id="confirmarSenha" placeholder="Confirmar senha">
            </div>

            <hr>

            <div class="col-lg-12 mt-3">
                <h5>Dados de contato</h5>
            </div>

            <div class="form-group my-3 col-lg-6">
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Pessoa de contato">
            </div>

            <div class="form-group my-3 col-lg-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail">
            </div>

            <div class="form-group my-3 col-lg-6">
                <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone">
            </div>

            <div class="form-group my-3 col-lg-6">
                <input type="text" class="form-control" name="celular" id="celular" placeholder="Celular">
            </div>

            <div class="form-group my-3 col-lg-12">
                <input type="text" class="form-control" name="site" id="site" placeholder="Site">
            </div>

            <hr>

            <div class="col-lg-12 mt-3">
                <h5>Sua empresa</h5>
            </div>

            <div class="form-group my-3 col-lg-10">
                <input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Logradouro">
            </div>

            <div class="form-group my-3 col-lg-2">
                <input type="text" class="form-control" name="numero" id="numero" placeholder="Número">
            </div>

            <div class="form-group my-3 col-lg-6">
                <input type="text" class="form-control" name="complemento" id="complemento" placeholder="Complemento">
            </div>

            <div class="form-group my-3 col-lg-3">
                <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">
            </div>

            <div class="form-group my-3 col-lg-3">
                <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade">
            </div>

            <div class="form-group my-3 col-lg-2">
                <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado">
            </div>

            <div class="form-group my-3 col-lg-5">
                <input type="text" class="form-control" name="pais" id="pais" placeholder="País">
            </div>

            <div class="form-group my-3 col-lg-5">
                <input type="text" class="form-control" name="cep" id="cep" placeholder="CEP">
            </div>

            <div class="form-group my-3 col-lg-12">
                <input type="text" class="form-control" name="nomeEmpresa" id="nomeEmpresa" placeholder="Nome da sua empresa">
            </div>

            <div class="form-group my-3 col-lg-12">
                <textarea id="suaEmpresa" name="suaEmpresa" rows="3" class="form-control" placeholder="Descreva sua empresa"></textarea>
            </div>

            <div class="col-lg-12 mt-3">
                <h5>Setor de atividade</h5>
            </div>

            <div class="col-lg-12 row my-3 d-flex justify-content-center">
                <div class="form-check col-lg-3 col-md-3 col-sm-4">
                    <input class="form-check-input" type="radio" name="setor" id="nutricao" value="nutricao">
                        Nutrição
                    </label>
                </div>
                <div class="form-check col-lg-3 col-md-3 col-sm-4">
                    <input class="form-check-input" type="radio" name="setor" id="gastronomia" value="gastronomia">
                        Gastronomia
                    </label>
                </div>
            </div>

            <div class="col-lg-12 mt-3">

                <button type="submit" class="btn btn-primary mb-3">Criar conta</button>

                <p>Já tem uma conta? <a href="loginPro.php">Entrar</a></p>

            </div>

        </div>
    </form>
</main>

@endsection

