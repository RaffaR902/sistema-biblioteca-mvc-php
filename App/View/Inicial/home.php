<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DigiTeca - Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/Includes/menu.css">
    <link rel="stylesheet" href="../../public/css/Inicial/home.css">
</head>

<body>
    <!-- Inclui o menu principal do sistema -->
    <?php include VIEWS . '/Includes/menu.php' ?>

    <!-- Container principal da home -->
    <div class="home-container">

        <!-- ========================= -->
        <!-- CARD DE BOAS-VINDAS -->
        <!-- ========================= -->
        <div class="welcome-card">

            <div>

                <!-- Título principal -->
                <h1 class="welcome-title">Bem-vindo ao Sistema </h1>

                <!-- Texto descritivo -->
                <p class="welcome-text">
                    Gerencie livros, alunos, autores e empréstimos
                    de forma simples e organizada.
                </p>

            </div>

        </div>


        <!-- ========================= -->
        <!-- CARDS DE ESTATÍSTICAS -->
        <!-- ========================= -->
        <div class="stats-grid">

            <!-- Total de livros -->
            <div class="stat-card">

                <h2><?= $totalLivros ?></h2>
                <p>Livros cadastrados</p>

            </div>

            <!-- Total de alunos -->
            <div class="stat-card">

                <h2><?= $totalAlunos ?></h2>
                <p>Alunos cadastrados</p>

            </div>

            <!-- Total de empréstimos ativos -->
            <div class="stat-card">

                <h2><?= $totalEmprestimos ?></h2>
                <p>Empréstimos ativos</p>

            </div>

            <!-- Total de autores -->
            <div class="stat-card">

                <h2><?= $totalAutores ?></h2>
                <p>Autores cadastrados</p>

            </div>

        </div>


        <!-- ========================= -->
        <!-- AÇÕES RÁPIDAS -->
        <!-- ========================= -->
        <div class="actions-card">

            <!-- Título da seção -->
            <h3 class="section-title">Ações rápidas</h3>

            <!-- Grid dos botões -->
            <div class="actions-grid">

                <!-- Botão para cadastrar livro -->
                <a href="/livro/cadastro" class="action-btn">+ Novo Livro</a>

                <!-- Botão para cadastrar aluno -->
                <a href="/aluno/cadastro" class="action-btn">+ Novo Aluno</a>

                <!-- Botão para cadastrar empréstimo -->
                <a href="/emprestimo/cadastro" class="action-btn">+ Novo Empréstimo</a>

                <!-- Botão para cadastrar autor -->
                <a href="/autor/cadastro" class="action-btn">+ Novo Autor</a>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"> </script>
</body>

</html>