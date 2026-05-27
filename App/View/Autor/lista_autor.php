<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DigiTeca - Lista de Autores</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/Includes/menu.css">
    <link rel="stylesheet" href="../../public/css/Autor/lista_autor.css">
</head>

<body>
    <!-- Inclui o menu de navegação -->
    <?php include VIEWS . '/Includes/menu.php' ?>

    <!-- Container principal da página -->
    <div class="page-container">

        <!-- Card da tabela -->
        <div class="table-card">

            <!-- Cabeçalho da página -->
            <div class="page-header">

                <!-- Título da página -->
                <h1 class="page-title">Lista de Autores</h1>

                <!-- Botão para cadastrar novo autor -->
                <a href="/autor/cadastro" class="btn-new">+ Novo Autor</a>

            </div>

            <!-- Exibe mensagens de erro caso existam -->
            <?php if(!empty($model->getErrors())): ?>

                <div class="error-box">
                    <?= $model->getErrors() ?>
                </div>

            <?php endif ?>

            <!-- Área responsiva da tabela -->
            <div class="table-responsive">

                <!-- Tabela de autores -->
                <table class="table align-middle">

                    <!-- Cabeçalho da tabela -->
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <!-- Corpo da tabela -->
                    <tbody>

                        <!-- Percorre todos os autores cadastrados -->
                        <?php foreach($model->rows as $autor): ?>

                        <tr>

                            <!-- ID do autor -->
                            <td><?= $autor->Id ?></td>

                            <!-- Nome do autor -->
                            <td>
                                <!-- Link para editar o autor -->
                                <a href="/autor/cadastro?id=<?= $autor->Id ?>" class="link-item">
                                    <?= $autor->Nome ?>
                                </a>

                            </td>

                            <!-- Ações -->
                            <td>

                                <!-- Botão para remover autor -->
                                <a href="/autor/delete?id=<?= $autor->Id ?>" class="btn-delete">
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