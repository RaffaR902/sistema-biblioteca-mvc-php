<?php

namespace App\Model;

use App\DAO\AutorDAO;
use Exception;

final class Autor extends Model
{
    // Armazena o ID do autor
    public ?int $Id = null;

    // Propriedade Nome do autor
    public ?string $Nome {

        // Executado ao definir valor para Nome
        set {
            // Valida se o nome possui ao menos 3 caracteres
            if (strlen($value) < 3)
                throw new Exception("Nome deve ter no mínimo 3 caracteres.");

            // Salva o valor da propriedade
            $this->Nome = $value;
        }

        // Retorna o valor do nome
        get => $this->Nome ?? null;
    }

    // Propriedade Data de Nascimento do autor
    public ?string $Data_Nascimento {

        // Executado ao definir valor para Data_Nascimento
        set {
            // Verifica se a data foi preenchida
            if (empty($value))
                throw new Exception("Preencha a Data de Nascimento");

            // Salva o valor da data de nascimento
            $this->Data_Nascimento = $value;
        }

        // Retorna o valor da data de nascimento
        get => $this->Data_Nascimento ?? null;
    }

    // Propriedade CPF do autor
    public ?string $CPF {

        // Executado ao definir valor para CPF
        set {
            // Valida se o CPF possui ao menos 11 caracteres
            if (strlen($value) < 11)
                throw new Exception("CPF deve ter no mínimo 11 caracteres.");

            // Salva o valor do CPF
            $this->CPF = $value;
        }

        // Retorna o valor do CPF
        get => $this->CPF ?? null;
    }

    /* Salva os dados do autor no banco
     * Se possuir ID realiza UPDATE
     * Caso contrário realiza INSERT
     */
    function save(): Autor
    {
        return new AutorDAO()->save($this);
    }

    // Busca um autor pelo ID
    function getById(int $id): ?Autor
    {
        return new AutorDAO()->selectById($id);
    }

    // Busca todos os autores cadastrados
    function getAllRows(): array
    {
        // Armazena os registros no atributo rows
        $this->rows = new AutorDAO()->select();

        return $this->rows;
    }

    // Remove um autor pelo ID
    function delete(int $id): bool
    {
        return new AutorDAO()->delete($id);
    }

    // Retorna a quantidade total de autores cadastrados
    function count(): int
    {
        return new AutorDAO()->count();
    }
}