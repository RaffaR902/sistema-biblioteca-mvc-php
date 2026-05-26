<?php

/* Inicia a sessão do sistema
 * Necessário para login, autenticação e armazenamento de dados do usuário
 */
session_start();

// Carrega o arquivo de configurações do sistema
include "config.php";

// Carrega o autoload responsável por incluir classes automaticamente
include "autoload.php";

/* Carrega as rotas da aplicação
 * Define quais controllers serão executados para cada URL
 */
include "routes.php";