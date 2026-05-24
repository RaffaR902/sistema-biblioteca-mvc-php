<?php

namespace App\Controller;

use App\Model\Model;

abstract class Controller
{
    /**
     * Verifica se existe um usuário logado na sessão.
     * Caso não exista, redireciona imediatamente para a página de login, protegendo a rota contra acessos não autorizados.
     */
    final protected static function isProtected() : void
    {
        if(!isset($_SESSION['usuario_logado']))
            header("Location: /login");
    }

    /**
     * Responsável por carregar o arquivo de visualização (View) e injetar o Model nele.
     * @param string $view Caminho do arquivo da view.
     * @param Model|null $model Objeto contendo os dados que serão exibidos na tela.
     */
    final protected static function render(string $view, ?Model $model) : void
    {
        include VIEWS . "/$view";
    }

    /**
     * Verifica se a requisição atual é do tipo POST.
     */
    final protected static function isPost() : bool
    {
        return $_SERVER['REQUEST_METHOD'] == "POST";
    }

    /**
     * Redireciona o usuário para uma rota específica.
     */
    final protected static function redirect(string $route) : void
    {
        header("Location: $route");
    }
}