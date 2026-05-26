<?php

/* Define o diretório base do projeto
 * dirname(__FILE__, 2) volta 2 níveis de pasta a partir deste arquivo
 */
define('BASE_DIR', dirname(__FILE__, 2));

// Define o caminho da pasta de Views do sistema
define('VIEWS', BASE_DIR . '/App/View');


// Configurações de conexão com banco de dados

// Endereço do servidor MySQL
$_ENV['db']['host'] = "localhost:3306";

// Usuário do banco de dados
$_ENV['db']['user'] = "root";

// Senha do banco de dados
$_ENV['db']['pass'] = "";

// Nome do banco utilizado pelo sistema
$_ENV['db']['database'] = "biblioteca";