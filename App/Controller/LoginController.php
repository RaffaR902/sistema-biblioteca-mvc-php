<?php

namespace App\Controller;

use App\Model\Login;

final class LoginController
{
    public static function index() : void
    {
        $erro = "";

        $model = new Login();

        // Se o formulário de login foi enviado (POST)
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {            
            $model->Email = $_POST['email'];
            $model->Senha = $_POST['senha'];
            
            // Tenta autenticar o usuário no banco de dados
            $model = $model->logar();

            // Se o retorno não for nulo, as credenciais estão corretas
            if($model !== null)
            {
                // Salva o objeto do usuário na sessão para mantê-lo logado
                $_SESSION['usuario_logado'] = $model;

                // Se o usuário marcou a opção "Lembrar-me"
                if(isset($_POST['lembrar']))
                {
                    // Cria um cookie válido por 30 dias com o email do usuário
                    setcookie(
                        name: "sistema_biblioteca_usuario",
                        value : $model->Email,
                        expires_or_options: time()+60*60*24*30
                    );
                }

                // Redireciona para a página inicial após o login com sucesso
                header("Location: /");
            } else {
                $erro = "Email ou senha incorretos";      
            }
        }

        // Preenche o email automaticamente se o cookie de "lembrar-me" existir
        if(isset($_COOKIE['sistema_biblioteca_usuario']))
            $model->Email = $_COOKIE['sistema_biblioteca_usuario'];

        // Renderiza a view de login
        include VIEWS . '/Login/form_login.php';
    }

    // Destrói a sessão atual do usuário, efetivando o logout.
    public static function logout() : void
    {
        session_destroy();
        header("Location: /login");
    }

    /**
     * Recupera os dados do usuário logado diretamente da sessão.
     * Utiliza serialize/unserialize para garantir a tipagem correta do objeto Login.
     */
    public static function getUsuario() : Login
    {
        return unserialize(serialize($_SESSION['usuario_logado']));
    }
}