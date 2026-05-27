<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DigiTeca - Cadastro de Livro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/Includes/menu.css">
    <link rel="stylesheet" href="../../public/css/Livro/form_livro.css">
</head>

<body>
    <!-- Inclui o menu do sistema -->
    <?php include VIEWS . '/Includes/menu.php' ?>

    <!-- Container principal -->
    <div class="page-container">

        <!-- Card do formulário -->
        <div class="form-card">

            <!-- Título -->
            <h1 class="page-title">Cadastro de Livro</h1>

            <!-- Subtítulo -->
            <p class="page-subtitle">Cadastre livros para o DigiTeca.</p>

            <!-- Exibe erros de validação -->
            <?php if (!empty($model->getErrors())): ?>

                <div class="error-box">
                    <?= $model->getErrors() ?>
                </div>

            <?php endif ?>

            <!-- Formulário -->
            <form method="post" action="/livro/cadastro">

                <!-- Campo oculto com ID -->
                <input name="id" type="hidden" value="<?= $model->Id ?>"/>


                <!-- ========================= -->
                <!-- CAMPO TÍTULO -->
                <!-- ========================= -->
                <div class="mb-4">

                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" value="<?= $model->Titulo ?>" class="form-control" name="titulo" id="titulo">

                </div>


                <!-- ========================= -->
                <!-- CAMPO ISBN -->
                <!-- ========================= -->
                <div class="mb-4">

                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" value="<?= $model->Isbn ?>" class="form-control" name="isbn" id="isbn">

                </div>


                <!-- ========================= -->
                <!-- CAMPO EDITORA -->
                <!-- ========================= -->
                <div class="mb-4">

                    <label for="editora" class="form-label">Editora</label>
                    <input type="text" value="<?= $model->Editora ?>" class="form-control" name="editora" id="editora">

                </div>


                <!-- ========================= -->
                <!-- CAMPO ANO -->
                <!-- ========================= -->
                <div class="mb-4">

                    <label for="ano" class="form-label">Ano</label>
                    <input type="text" value="<?= $model->Ano ?>" class="form-control" name="ano" id="ano">

                </div>


                <!-- ========================= -->
                <!-- SELECT DE CATEGORIA -->
                <!-- ========================= -->
                <div class="mb-4">

                    <label for="id_categoria" class="form-label">Categoria</label>

                    <select class="form-control" name="id_categoria" id="id_categoria">

                        <!-- Opção padrão -->
                        <option>Selecione uma categoria</option>

                        <!-- Lista categorias -->
                        <?php foreach ($model->rows_categorias as $item): ?>

                            <option value="<?= $item->Id ?>"

                                <?= ($item->Id == $model->Id_Categoria) ? 'selected' : '' ?>>
                                <?= $item->Descricao ?>

                            </option>

                        <?php endforeach ?>

                    </select>

                </div>


                <!-- ========================= -->
                <!-- CHECKBOX DE AUTORES -->
                <!-- ========================= -->
                <div class="mb-4">

                    <label class="form-label">Autores</label>

                    <!-- Caixa dos autores -->
                    <div class="authors-box">

                        <!-- Percorre autores -->
                        <?php foreach ($model->rows_autores as $item): ?>

                            <div class="form-check mb-2">

                                <!-- Checkbox ID do Autor-->
                                <input class="form-check-input" type="checkbox" 
                                    value="<?= $item->Id ?>" name="autor[]" 
                                    id="autor<?= $item->Id ?>"
                                    <?= (in_array($item->Id, $model->Id_Autores)) ? 'checked' : '' ?> />

                                <!-- Nome do autor -->
                                <label class="form-check-label" for="autor<?= $item->Id ?>">

                                    <?= $item->Nome ?>

                                </label>

                            </div>

                        <?php endforeach ?>

                    </div>

                </div>

                <!-- Botão salvar -->
                <button type="submit" class="btn-save">Salvar</button>

            </form>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>