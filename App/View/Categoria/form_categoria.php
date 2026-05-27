<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DigiTeca - Cadastro de Categorias</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/Includes/menu.css">
    <link rel="stylesheet" href="../../public/css/Categoria/form_categoria.css">
</head>

<body>
    <!-- Inclui o menu de navegação -->
    <?php include VIEWS . '/Includes/menu.php' ?>

    <!-- Container principal da página -->
    <div class="page-container">

        <!-- Card do formulário -->
        <div class="form-card">

            <!-- Título da página -->
            <h1 class="page-title">Cadastro de Categoria</h1>

            <!-- Texto descritivo -->
            <p class="page-subtitle">Cadastre categorias para organizar os livros.</p>

            <!-- Exibe mensagens de erro caso existam -->
            <?php if(!empty($model->getErrors())): ?>

                <div class="error-box">
                    <?= $model->getErrors() ?>
                </div>

            <?php endif ?>

            <!-- Formulário de cadastro -->
            <form method="post" action="/categoria/cadastro">

                <!-- Campo oculto utilizado na edição -->
                <input name="id" type="hidden" value="<?= $model->Id ?>" />

                <!-- Campo descrição -->
                <div class="mb-4">

                    <label for="descricao" class="form-label">
                        Descrição
                    </label>

                    <input type="text" value="<?= $model->Descricao ?>" 
                        class="form-control" name="descricao" id="descricao">

                </div>

                <!-- Botão de salvar -->
                <button type="submit" class="btn-save">Salvar</button>

            </form>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>