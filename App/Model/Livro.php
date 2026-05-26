<?php

namespace App\Model;

use App\DAO\LivroDAO;
use Exception;

final class Livro extends Model
{
    // Armazena o ID do livro
    public ?int $Id = null;

    // Lista de categorias disponíveis
    public array $rows_categorias = [];

    // Lista de autores disponíveis
    public array $rows_autores = [];

    // Armazena o ID da categoria selecionada
    public $Id_Categoria;

    // Armazena os IDs dos autores selecionados
    public $Id_Autores;

    // Propriedade Titulo do livro
    public ?string $Titulo {

        // Executado ao definir valor para Titulo
        set {
            // Valida se o título possui ao menos 3 caracteres
            if (strlen($value) < 3)
                throw new Exception("Título deve ter no mínimo 3 caracteres.");

            // Salva o valor do título
            $this->Titulo = $value;
        }

        // Retorna o valor do título
        get => $this->Titulo ?? null;
    }

    // Propriedade ISBN do livro
    public ?string $Isbn {

        // Executado ao definir valor para ISBN
        set {
            // Valida se o ISBN possui ao menos 3 caracteres
            if (strlen($value) < 3)
                throw new Exception("ISBN deve ter no mínimo 3 caracteres.");

            // Salva o valor do ISBN
            $this->Isbn = $value;
        }

        // Retorna o valor do ISBN
        get => $this->Isbn ?? null;
    }

    // Propriedade Editora do livro
    public ?string $Editora {

        // Executado ao definir valor para Editora
        set {
            // Valida se a editora possui ao menos 2 caracteres
            if (strlen($value) < 2)
                throw new Exception("Editora deve ter no mínimo 2 caracteres.");

            // Salva o valor da editora
            $this->Editora = $value;
        }

        // Retorna o valor da editora
        get => $this->Editora ?? null;
    }

    // Propriedade Ano do livro
    public ?string $Ano {

        // Executado ao definir valor para Ano
        set {
            // Valida se o ano possui ao menos 4 caracteres
            if (strlen($value) < 4)
                throw new Exception("Ano deve ter no mínimo 4 caracteres.");

            // Salva o valor do ano
            $this->Ano = $value;
        }

        // Retorna o valor do ano
        get => $this->Ano ?? null;
    }

    /* Salva os dados do livro no banco
     * Se possuir ID realiza UPDATE
     * Caso contrário realiza INSERT
     */
    function save(): Livro
    {
        return new LivroDAO()->save($this);
    }

    // Busca um livro pelo ID
    function getById(int $id): ?Livro
    {
        return new LivroDAO()->selectById($id);
    }

    // Busca todos os livros cadastrados
    function getAllRows(): array
    {
        // Armazena os registros no atributo rows
        $this->rows = new LivroDAO()->select();
        return $this->rows;
    }

    // Remove um livro pelo ID
    function delete(int $id): bool
    {
        return new LivroDAO()->delete($id);
    }

    // Retorna a quantidade total de livros cadastrados
    function count(): int
    {
        return new LivroDAO()->count();
    }
}