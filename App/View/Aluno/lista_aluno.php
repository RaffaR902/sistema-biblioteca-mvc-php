<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DigiTeca - Lista de Alunos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/Includes/menu.css">
    <link rel="stylesheet" href="../../public/css/Aluno/lista_aluno.css">
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
                <h1 class="page-title">Lista de Alunos</h1>

                <!-- Botão para cadastrar novo aluno -->
                <a href="/aluno/cadastro" class="btn-new">
                    + Novo Aluno
                </a>

            </div>

            <!-- Exibe mensagens de erro caso existam -->
            <?php if(!empty($model->getErrors())): ?>

                <div class="error-box">
                    <?= $model->getErrors() ?>
                </div>

            <?php endif ?>

            <!-- Área responsiva da tabela -->
            <div class="table-responsive">

                <!-- Tabela de alunos -->
                <table class="table align-middle">

                    <!-- Cabeçalho da tabela -->
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Curso</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <!-- Corpo da tabela -->
                    <tbody>

                        <!-- Percorre todos os alunos cadastrados -->
                        <?php foreach($model->rows as $aluno): ?>

                        <tr>

                            <!-- ID do aluno -->
                            <td>
                                <?= $aluno->Id ?>
                            </td>

                            <!-- Nome do aluno -->
                            <td>
                                <!-- Link para editar o aluno -->
                                <a href="/aluno/cadastro?id=<?= $aluno->Id ?>" class="link-aluno">
                                    <?= $aluno->Nome ?>
                                </a>
                            </td>

                            <!-- Curso do aluno -->
                            <td>
                                <?= $aluno->Curso ?>
                            </td>

                            <!-- Área de ações -->
                            <td>
                                <!-- Botão para remover aluno -->
                                <a href="/aluno/delete?id=<?= $aluno->Id ?>" class="btn-delete">
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