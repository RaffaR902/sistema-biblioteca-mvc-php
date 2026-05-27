<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DigiTeca - Lista de Categorias</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/Includes/menu.css">
    <link rel="stylesheet" href="../../public/css/Categoria/lista_categoria.css">
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
                <h1 class="page-title">Lista de Categorias</h1>

                <!-- Botão para cadastrar nova categoria -->
                <a href="/categoria/cadastro" class="btn-new">
                    + Nova Categoria
                </a>

            </div>

            <!-- Exibe mensagens de erro -->
            <?php if (!empty($model->getErrors())): ?>

                <div class="error-box">
                    <?= $model->getErrors() ?>
                </div>

            <?php endif ?>

            <!-- Container responsivo da tabela -->
            <div class="table-responsive">

                <!-- Tabela de categorias -->
                <table class="table align-middle">

                    <!-- Cabeçalho da tabela -->
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <!-- Corpo da tabela -->
                    <tbody>

                        <!-- Percorre todas as categorias -->
                        <?php foreach ($model->rows as $categoria): ?>

                            <tr>
                                <!-- ID da categoria -->
                                <td><?= $categoria->Id ?></td>

                                <!-- Nome/descrição da categoria -->
                                <td>
                                    <!-- Link para editar categoria -->
                                    <a href="/categoria/cadastro?id=<?= $categoria->Id ?>" class="link-item">
                                        <?= $categoria->Descricao ?>
                                    </a>
                                </td>

                                <!-- Botão de remoção -->
                                <td>
                                    <a href="/categoria/delete?id=<?= $categoria->Id ?>" class="btn-delete">
                                        Remover
                                    </a>
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