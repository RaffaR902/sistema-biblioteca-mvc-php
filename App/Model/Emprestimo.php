<?php

namespace App\Model;

use App\DAO\EmprestimoDAO;

final class Emprestimo extends Model
{
    // Armazena o ID do empréstimo
    public ?int $Id = null;

    // ID do usuário que realizou o empréstimo
    public ?int $Id_Usuario = null;

    // ID do livro emprestado
    public ?int $Id_Livro = null;

    // ID do aluno que recebeu o empréstimo
    public ?int $Id_Aluno = null;

    // Data prevista para devolução
    public ?string $Data_Devolucao = null;

    // Data em que o empréstimo foi realizado
    public ?string $Data_Emprestimo = null;

    // Dados completos do aluno (preenchidos ao buscar empréstimo)
    public ?Aluno $Dados_Aluno = null;

    // Dados completos do livro (preenchidos ao buscar empréstimo)
    public ?Livro $Dados_Livro = null;

    // Armazena lista de livros disponíveis ou selecionados
    public array $rows_livros = [];

    // Armazena lista de alunos disponíveis ou selecionados
    public array $rows_alunos = [];

    // Salva o empréstimo no banco (insert ou update)
    function save(): Emprestimo
    {
        return new EmprestimoDAO()->save($this);
    }

    // Busca um empréstimo pelo ID
    function getById(int $id): ?Emprestimo
    {
        return new EmprestimoDAO()->selectById($id);
    }

    // Busca todos os empréstimos cadastrados
    function getAllRows(): array
    {
        $this->rows = new EmprestimoDAO()->select();
        return $this->rows;
    }

    // Remove um empréstimo pelo ID
    function delete(int $id): bool
    {
        return new EmprestimoDAO()->delete($id);
    }

    // Retorna a quantidade de empréstimos ativos
    function countAtivos(): int
    {
        return new EmprestimoDAO()->countAtivos();
    }
}