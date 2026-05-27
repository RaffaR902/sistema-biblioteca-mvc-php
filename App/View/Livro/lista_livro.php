<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DigiTeca - Lista de Livros</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/Includes/menu.css">
    <link rel="stylesheet" href="../../public/css/Livro/lista_livro.css">
</head>

<body>
    <!-- Inclui o menu principal do sistema -->
    <?php include VIEWS . '/Includes/menu.php' ?>

    <!-- Container principal da página -->
    <div class="page-container">

        <!-- Card da tabela -->
        <div class="table-card">

            <!-- Cabeçalho da página -->
            <div class="page-header">

                <!-- Título -->
                <h1 class="page-title">Lista de Livros</h1>

                <!-- Botão para cadastrar novo livro -->
                <a href="/livro/cadastro" class="btn-new">+ Novo Livro</a>

            </div>

            <!-- Exibe mensagens de erro, caso existam -->
            <?php if(!empty($model->getErrors())): ?>
                
                <div class="error-box"><?= $model->getErrors() ?></div>

            <?php endif ?>

            <!-- Deixa a tabela responsiva -->
            <div class="table-responsive">

                <!-- Tabela de livros -->
                <table class="table align-middle">

                    <!-- Cabeçalho da tabela -->
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <!-- Corpo da tabela -->
                    <tbody>

                        <!-- Percorre todos os livros cadastrados -->
                        <?php foreach($model->rows as $livro): ?>

                        <tr>
                            <!-- ID do livro -->
                            <td><?= $livro->Id ?></td>

                            <!-- Link para editar o livro -->
                            <td>
                                <a href="/livro/cadastro?id=<?= $livro->Id ?>" class="link-item">
                                    <?= $livro->Titulo ?>
                                </a>
                            </td>

                            <!-- Botão para remover o livro -->
                            <td>
                                <a href="/livro/delete?id=<?= $livro->Id ?>" class="btn-delete">Remover</a>
                            </td>
                        </tr>

                        <?php endforeach ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>