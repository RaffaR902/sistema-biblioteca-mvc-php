<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigiTeca - Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/Login/form_login.css">
</head>

<body>
    <!-- Container principal da página -->
    <div class="main-container">

        <!-- Card principal do login -->
        <div class="card main-card">

            <!-- Linha do Bootstrap -->
            <div class="row g-0">

                <!-- ========================= -->
                <!-- LADO ESQUERDO DO CARD -->
                <!-- ========================= -->
                <div class="col-md-6 left-side">

                    <!-- Título do sistema -->
                    <h1>DigiTeca</h1>

                    <!-- Texto descritivo -->
                    <p>
                        Gerencie livros, empréstimos e usuários
                        em um sistema moderno e intuitivo.
                    </p>

                </div>


                <!-- ========================= -->
                <!-- LADO DIREITO DO CARD -->
                <!-- ========================= -->
                <div class="col-md-6 right-side">

                    <!-- Caixa do formulário -->
                    <div class="login-box">

                        <!-- Título do login -->
                        <h2>Login</h2>

                        <!-- Texto auxiliar -->
                        <p class="text-muted mb-4">Entre para acessar o sistema</p>

                        <!-- Exibe mensagem de erro caso exista -->
                        <?= $erro ?>

                        <!-- Formulário de login -->
                        <form method="post" action="/login">

                            <!-- Campo de e-mail -->
                            <div class="mb-3">

                                <label class="form-label">E-mail</label>

                                <!-- Mantém o valor digitado -->
                                <input type="email" class="form-control" name="email" value="<?= $model->Email ?>" 
                                placeholder="Digite seu e-mail" required>

                            </div>

                            <!-- Campo de senha -->
                            <div class="mb-3">

                                <label class="form-label">Senha</label>
                                <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>

                            </div>

                            <!-- Checkbox "lembrar usuário" -->
                            <div class="form-check mb-4">

                                <input class="form-check-input" type="checkbox" name="lembrar" id="lembrar">
                                <label class="form-check-label" for="lembrar">Lembrar usuário</label>

                            </div>

                            <!-- Botão de envio do formulário -->
                            <button type="submit" class="btn btn-primary btn-login">
                                Entrar
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>