<?php

/* Registra uma função de autoload automática
 * Essa função é chamada sempre que uma classe for utilizada e ainda não estiver carregada no sistema
 */
spl_autoload_register(function ($nome_da_classe)
{
    /* Monta o caminho completo do arquivo da classe
     * Exemplo:
     * App\Model\Aluno -> BASE_DIR/App/Model/Aluno.php
     */
    $arquivo = BASE_DIR . "/" . $nome_da_classe . ".php";

    // Verifica se o arquivo existe
    if(file_exists($arquivo))
    {
        // Inclui automaticamente o arquivo da classe
        include $arquivo;
    } 
    else
    {
        // Lança exceção caso o arquivo não seja encontrado
        throw new Exception("Arquivo não encontrado");
    }
});