<?php

// Importa o controller responsável pelo login
use App\Controller\LoginController;

// Obtém os dados do usuário logado
$usuario = LoginController::getUsuario();

?>

<!-- Navbar principal -->
<nav class="navbar navbar-expand-lg navbar-custom shadow-sm">

    <!-- Container fluido do Bootstrap -->
    <div class="container-fluid">

        <!-- ========================= -->
        <!-- LOGO DO SISTEMA -->
        <!-- ========================= -->
        <a class="navbar-brand brand-custom" href="/">📚 DigiTeca</a>


        <!-- ========================= -->
        <!-- BOTÃO MOBILE -->
        <!-- ========================= -->

        <!-- data-bs-toggle="collapse" Controla o collapse -->
        <!-- data-bs-target="#navbarNavAltMarkup" ID da área que será aberta -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
            <span class="navbar-toggler-icon"></span><!-- Ícone do botão -->
        </button>


        <!-- ========================= -->
        <!-- ÁREA COLAPSÁVEL DO MENU -->
        <!-- ========================= -->

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

            <!-- Container dos links -->
            <div class="navbar-nav">

                <!-- ========================= -->
                <!-- MENU ALUNO -->
                <!-- ========================= -->
                <div class="nav-item dropdown">

                    <!-- Botão dropdown -->
                    <a class="nav-link dropdown-toggle nav-custom" href="#" role="button" data-bs-toggle="dropdown">
                        Aluno
                    </a>

                    <!-- Lista do dropdown -->
                    <ul class="dropdown-menu dropdown-custom">
                        <li>
                            <!-- Link para lista -->
                            <a class="dropdown-item" href="/aluno">Lista de Alunos</a>
                        </li>

                        <li>
                            <!-- Link para cadastro -->
                            <a class="dropdown-item" href="/aluno/cadastro">Novo Aluno</a>
                        </li>
                    </ul>

                </div>


                <!-- ========================= -->
                <!-- MENU EMPRÉSTIMOS -->
                <!-- ========================= -->
                <div class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle nav-custom" href="#" role="button" data-bs-toggle="dropdown">
                        Empréstimos
                    </a>

                    <ul class="dropdown-menu dropdown-custom">
                        <li>
                            <a class="dropdown-item" href="/emprestimo">Lista de Empréstimos</a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="/emprestimo/cadastro">Novo Empréstimo</a>
                        </li>
                    </ul>

                </div>


                <!-- ========================= -->
                <!-- MENU LIVROS -->
                <!-- ========================= -->
                <div class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle nav-custom" href="#" role="button" data-bs-toggle="dropdown">Livros</a>

                    <ul class="dropdown-menu dropdown-custom">
                        <li>
                            <a class="dropdown-item" href="/livro">Lista de Livros</a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="/livro/cadastro">Novo Livro</a>
                        </li>
                    </ul>

                </div>


                <!-- ========================= -->
                <!-- MENU CATEGORIAS -->
                <!-- ========================= -->
                <div class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle nav-custom" href="#" role="button" data-bs-toggle="dropdown">Categorias</a>

                    <ul class="dropdown-menu dropdown-custom">
                        <li>
                            <a class="dropdown-item" href="/categoria">Lista de Categorias</a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="/categoria/cadastro">Nova Categoria</a>
                        </li>
                    </ul>

                </div>


                <!-- ========================= -->
                <!-- MENU AUTORES -->
                <!-- ========================= -->
                <div class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle nav-custom" href="#" role="button" data-bs-toggle="dropdown">Autores</a>

                    <ul class="dropdown-menu dropdown-custom">
                        <li>
                            <a class="dropdown-item" href="/autor">Lista de Autores</a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="/autor/cadastro">Novo Autor</a>
                        </li>
                    </ul>

                </div>

            </div>


            <!-- ========================= -->
            <!-- ÁREA DIREITA DO MENU -->
            <!-- ========================= -->
            <div class="d-flex align-items-center ms-auto gap-3">

                <!-- Nome do usuário logado -->
                <div class="user-pill">
                    <span>
                        Olá,
                        <strong>
                            <!-- Exibe nome do usuário -->
                            <?= $usuario->Nome ?>
                        </strong>
                    </span>
                </div>

                <!-- Botão de logout -->
                <a class="btn btn-logout" href="/logout">Sair</a>

            </div>
            
        </div>

    </div>
    
</nav>