<?php

namespace App\DAO;

use PDO;

/**
 * Classe abstrata responsável por gerenciar a conexão com o banco de dados.
 * Todas as DAOs do sistema herdam desta classe.
 */
abstract class DAO extends PDO
{
    /**
     * Armazena a conexão com o banco.
     * "static" faz com que a mesma conexão seja reutilizada por todas as DAOs.
     */
    protected static $conexao = null;

    /**
     * Construtor da classe DAO.
     * Cria a conexão com o banco de dados caso ela ainda não exista.
     */
    public function __construct()
    {
        // Monta a string de conexão (DSN) usando as informações do arquivo de configuração.
        $dsn = "mysql:host=" . $_ENV['db']['host'] .
               ";dbname=" . $_ENV['db']['database'];


        // Verifica se ainda não existe conexão ativa.
        if (self::$conexao == null) 
        {
            // Cria uma nova conexão PDO.
            self::$conexao = new PDO(
                $dsn,

                // Usuário do banco
                $_ENV['db']['user'],

                // Senha do banco
                $_ENV['db']['pass'],

                [
                    // Mantém conexões persistentes para melhorar desempenho.
                    PDO::ATTR_PERSISTENT => true,

                    // Faz o PDO lançar exceções quando ocorrer erro SQL.
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

                    // Define UTF-8 para suportar caracteres especiais corretamente.
                    \Pdo\Mysql::ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'
                ]
            );
        }
    }
}