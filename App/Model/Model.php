<?php

namespace App\Model;

abstract class Model
{
    /* Armazena os registros retornados das consultas
     * Utilizado principalmente nas listagens
     */
    final public array $rows = [];

    // Armazena mensagens de erro do sistema
    private array $errors = [];

    // Adiciona uma mensagem de erro ao array
    final public function setError(string $msg) : void
    {
        $this->errors[] = $msg;
    }

    // Retorna os erros formatados em HTML
    final public function getErrors() : string
    {
        // Se não houver erros retorna string vazia
        if(empty($this->errors))
            return "";

        // Inicia lista HTML
        $msg = "<ul>";

        // Percorre todos os erros adicionando cada um na lista
        foreach($this->errors as $error)
            $msg .= "<li>$error</li>";

        // Fecha lista HTML
        $msg .= "</ul>";

        // Retorna HTML formatado
        return $msg;
    }
}