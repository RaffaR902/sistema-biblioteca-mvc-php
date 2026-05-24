<?php

namespace App\Controller;

final class InicialController extends Controller
{
    // Rota raiz ("/"). Verifica segurança e carrega a tela principal.
    public static function index() : void
    {
        parent::isProtected();       

        // Usa 'include' direto ao invés de 'parent::render' pois a home pode não necessitar de um Model específico para iniciar.
        include VIEWS . '/Inicial/home.php';
    }
}