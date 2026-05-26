<?php

namespace App\Model;

use App\DAO\LoginDAO;

final class Login
{
    // Propriedades do usuário
    public $Id;
    public $Email;
    public $Senha;
    public $Nome;

    /* Realiza autenticação do usuário
     * Retorna um objeto Login completo se os dados estiverem corretos
     * Retorna null caso a autenticação falhe
     */
    public function logar() : ?Login
    {
        return new LoginDAO()->autenticar($this);
    }
}