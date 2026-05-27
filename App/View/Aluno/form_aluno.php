<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DigiTeca - Cadastro de Aluno</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/Includes/menu.css">
    <link rel="stylesheet" href="../../public/css/Aluno/form_aluno.css">
</head>

<body>
    <!-- Inclui o menu de navegação -->
    <?php include VIEWS . '/Includes/menu.php' ?>

    <!-- Container principal da página -->
    <div class="page-container">

        <!-- Armazena as mensagens de erro -->
        <?php $errors = $model->getErrors(); ?>

        <!-- Exibe os erros caso existam -->
        <?php if (!empty($errors)): ?>

            <div class="error-box">
                <?= $errors ?>
            </div>

        <?php endif ?>

        <!-- Card do formulário -->
        <div class="form-card">

            <!-- Título da página -->
            <h1 class="page-title">Cadastro de Aluno</h1>

            <!-- Texto descritivo -->
            <p class="page-subtitle">Preencha os dados do aluno abaixo.</p>

            <!-- Formulário de cadastro -->
            <form method="post" action="/aluno/cadastro">

                <!-- Campo oculto utilizado na edição -->
                <input name="id" type="hidden" value="<?= $model->Id ?>" />

                <!-- Campo nome -->
                <div class="mb-4">

                    <label for="nome" class="form-label">Nome</label>

                    <input type="text" value="<?= $model->Nome ?>"
                    class="form-control" name="nome" id="nome" placeholder="Digite o nome do aluno">

                </div>

                <!-- Campo RA -->
                <div class="mb-4">

                    <label for="ra" class="form-label"> RA </label>

                    <input type="text" value="<?= $model->RA ?>"
                        class="form-control" name="ra" id="ra" placeholder="Digite o RA">

                </div>

                <!-- Campo curso -->
                <div class="mb-4">

                    <label for="curso" class="form-label">Curso</label>

                    <input type="text" value="<?= $model->Curso ?>"
                        class="form-control" name="curso" id="curso" placeholder="Digite o curso">

                </div>

                <!-- Botão de salvar -->
                <button type="submit" class="btn btn-save">Salvar</button>

            </form>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>