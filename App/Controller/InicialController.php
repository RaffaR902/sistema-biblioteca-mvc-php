<?php

namespace App\Controller;

// Importa os Models utilizados para buscar os dados do dashboard
use App\Model\Aluno;
use App\Model\Livro;
use App\Model\Autor;
use App\Model\Emprestimo;

// Controller responsável pela tela inicial do sistema
final class InicialController extends Controller
{
    // Método chamado ao acessar a rota principal "/"
    public static function index() : void
    {
        // Verifica se o usuário está autenticado.
        // Caso não esteja logado, será redirecionado para o login.
        parent::isProtected();      

        // Busca a quantidade total de livros cadastrados
        $totalLivros = (new Livro())->count();

        // Busca a quantidade total de alunos cadastrados
        $totalAlunos = (new Aluno())->count();

        // Busca a quantidade total de autores cadastrados
        $totalAutores = (new Autor())->count();

        // Busca a quantidade de empréstimos ativos
        $totalEmprestimos = (new Emprestimo())->countAtivos();

        // Carrega a View da tela inicial.
        // As variáveis acima ficam disponíveis dentro da View.
        include VIEWS . '/Inicial/home.php';
    }
}