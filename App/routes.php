<?php

// Importa os Controllers utilizados nas rotas do sistema
use App\Controller\{
    AlunoController,
    InicialController,
    LoginController,
    AutorController,
    CategoriaController,
    LivroController,
    EmprestimoController
};

// Captura apenas o caminho da URL acessada
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

/* Estrutura responsável pelo roteamento do sistema
 * Define qual Controller e método serão executados
 */
switch($url)
{
    // Tela inicial do sistema
    case '/':
        InicialController::index();
    break;
   


    // Tela de login
    case '/login':
        LoginController::index();
    break;

    // Logout do usuário
    case '/logout':
        LoginController::logout();
    break;



    // Lista de alunos
    case '/aluno':        
        AlunoController::index();
    break;

    // Cadastro e edição de alunos
    case '/aluno/cadastro':
        AlunoController::cadastro();
    break;

    // Exclusão de aluno
    case '/aluno/delete':
        AlunoController::delete();
    break;



    // Lista de autores
    case '/autor':        
        AutorController::index();
    break;

    // Cadastro e edição de autores
    case '/autor/cadastro':
        AutorController::cadastro();
    break;

    // Exclusão de autor
    case '/autor/delete':
        AutorController::delete();
    break;



    // Lista de categorias
    case '/categoria':        
        CategoriaController::index();
    break;

    // Cadastro e edição de categorias
    case '/categoria/cadastro':
        CategoriaController::cadastro();
    break;

    // Exclusão de categoria
    case '/categoria/delete':
        CategoriaController::delete();
    break;



    // Lista de livros
    case '/livro':        
        LivroController::index();
    break;

    // Cadastro e edição de livros
    case '/livro/cadastro':
        LivroController::cadastro();
    break;

    // Exclusão de livro
    case '/livro/delete':
        LivroController::delete();
    break; 
    

    
    // Lista de empréstimos
    case '/emprestimo':        
        EmprestimoController::index();
    break;

    // Cadastro e edição de empréstimos
    case '/emprestimo/cadastro':
        EmprestimoController::cadastro();
    break;

    // Exclusão de empréstimo
    case '/emprestimo/delete':
        EmprestimoController::delete();
    break;  
}