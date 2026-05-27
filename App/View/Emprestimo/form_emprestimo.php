<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DigiTeca - Cadastro de Empréstimo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/Includes/menu.css">
    <link rel="stylesheet" href="../../public/css/Emprestimo/form_emprestimo.css">
</head>

<body>
    <!-- Inclui o menu principal do sistema -->
    <?php include VIEWS . '/Includes/menu.php' ?>

    <!-- Container principal -->
    <div class="page-container">

        <!-- Card do formulário -->
        <div class="form-card">

            <!-- Título da página -->
            <h1 class="page-title">Cadastro de Empréstimo</h1>

            <!-- Texto descritivo -->
            <p class="page-subtitle">Registre um novo empréstimo de livro</p>

            <!-- Exibe mensagens de erro -->
            <?php if(!empty($model->getErrors())): ?>

                <div class="error-box">
                    <?= $model->getErrors() ?>
                </div>

            <?php endif ?>

            <!-- Formulário de cadastro -->
            <form method="post" action="/emprestimo/cadastro">

                <!-- Campo oculto do ID -->
                <!-- Utilizado para edição -->
                <input name="id" type="hidden" value="<?= $model->Id ?>" />


                <!-- ========================= -->
                <!-- SELECT DE ALUNOS -->
                <!-- ========================= -->
                <div class="mb-4">

                    <label for="id_aluno" class="form-label">Aluno</label>

                    <select class="form-control" name="id_aluno" id="id_aluno">

                        <!-- Opção padrão -->
                        <option>Selecione um aluno</option>

                        <!-- Percorre todos os alunos -->
                        <?php foreach($model->rows_alunos as $item): ?>

                            <!-- Marca o aluno atual em edição -->
                            <option value="<?= $item->Id ?>"
                                <?= ($item->Id == $model->Dados_Aluno?->Id) ? 'selected' : '' ?>>
                                <?= $item->Nome ?>
                            </option>

                        <?php endforeach ?>

                    </select>

                </div>


                <!-- ========================= -->
                <!-- SELECT DE LIVROS -->
                <!-- ========================= -->
                <div class="mb-4">

                    <label for="id_livro" class="form-label">
                        Livro
                    </label>

                    <select class="form-control" name="id_livro" id="id_livro">

                        <!-- Opção padrão -->
                        <option>Selecione um livro</option>

                        <!-- Percorre todos os livros -->
                        <?php foreach($model->rows_livros as $item): ?>

                            <!-- Marca o livro atual em edição -->
                            <option value="<?= $item->Id ?>"
                                <?= ($item->Id == $model->Dados_Livro?->Id) ? 'selected' : '' ?>>
                                <?= $item->Titulo ?>
                            </option>

                        <?php endforeach ?>

                    </select>

                </div>


                <!-- ========================= -->
                <!-- DATA DO EMPRÉSTIMO -->
                <!-- ========================= -->
                <div class="mb-4">

                    <label for="data_emprestimo" class="form-label">
                        Data Empréstimo
                    </label>

                    <input type="date" value="<?= $model->Data_Emprestimo ?>" class="form-control"
                        name="data_emprestimo" id="data_emprestimo">

                </div>


                <!-- ========================= -->
                <!-- DATA DE DEVOLUÇÃO -->
                <!-- ========================= -->
                <div class="mb-4">

                    <label for="data_devolucao" class="form-label">
                        Data Devolução
                    </label>

                    <input type="date" value="<?= $model->Data_Devolucao ?>" class="form-control"
                        name="data_devolucao" id="data_devolucao">

                </div>

                <!-- Botão de salvar -->
                <button type="submit" class="btn-save">
                    Salvar
                </button>

            </form>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>