<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DigiTeca - Lista de Empréstimo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/Includes/menu.css">
    <link rel="stylesheet" href="../../public/css/Emprestimo/lista_emprestimo.css">
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
                <h1 class="page-title">Lista de Empréstimos</h1>

                <!-- Botão para cadastrar novo empréstimo -->
                <a href="/emprestimo/cadastro" class="btn-new">+ Novo Empréstimo</a>

            </div>

            <!-- Exibe mensagens de erro -->
            <?php if(!empty($model->getErrors())): ?>

                <div class="error-box">
                    <?= $model->getErrors() ?>
                </div>

            <?php endif ?>

            <!-- Torna a tabela responsiva -->
            <div class="table-responsive">

                <!-- Tabela de empréstimos -->
                <table class="table align-middle">

                    <!-- Cabeçalho da tabela -->
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Aluno</th>
                            <th>Livro</th>
                            <th>Data Devolução</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <!-- Corpo da tabela -->
                    <tbody>

                        <!-- Percorre todos os empréstimos -->
                        <?php foreach($model->rows as $item): ?>
                        <tr>
                            <!-- ID do empréstimo -->
                            <td>
                                <?= $item->Id ?>
                            </td>

                            <!-- Nome do aluno -->
                            <td>
                                <!-- Link para editar o empréstimo -->
                                <a href="/emprestimo/cadastro?id=<?= $item->Id ?>" class="link-item">
                                    <?= $item->Dados_Aluno->Nome ?>
                                </a>
                            </td>

                            <!-- Livro emprestado -->
                            <td>
                                <?= $item->Dados_Livro->Titulo ?>
                            </td>

                            <!-- Data de devolução -->
                            <td>
                                <?= $item->Data_Devolucao ?>
                            </td>

                            <!-- Botão para remover empréstimo -->
                            <td>
                                <a href="/emprestimo/delete?id=<?= $item->Id ?>" class="btn-delete">Remover</a>
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