<?php

namespace App\DAO;

use App\Model\Login;

// Classe responsável pela autenticação de usuários no sistema.
final class LoginDAO extends DAO
{
    /**
     * Verifica se existe um usuário com o email e senha informados.
     * 
     * Retorna:
     * - Objeto Login se autenticar
     * - null se login falhar
     */
    public function autenticar(Login $model) : ?Login
    {
        /**
         * Busca um usuário pelo email e senha.
         * A senha informada é criptografada com SHA1 antes da comparação.
         */
        $sql = "
            SELECT *
            FROM usuario
            WHERE email=?
            AND senha=sha1(?)
        ";

        // Prepara o SQL
        $stmt = parent::$conexao->prepare($sql);

        // Define o email informado
        $stmt->bindValue(1, $model->Email);

        // Define a senha informada
        $stmt->bindValue(2, $model->Senha);

        // Executa a consulta
        $stmt->execute();

        /**
         * Converte o resultado em objeto Login.
         * Se não encontrar usuário, o retorno será false.
         */
        $model = $stmt->fetchObject("App\Model\Login");

        /**
         * Verifica se o resultado é um objeto válido.
         * 
         * Retorna:
         * - objeto Login
         * - null
         */
        return is_object($model)
            ? $model
            : null;
    }
}