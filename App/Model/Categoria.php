<?php

namespace App\Model;

use App\DAO\CategoriaDAO;
use Exception;

final class Categoria extends Model
{
    // Armazena o ID da categoria
    public ?int $Id = null;

    // Propriedade Descricao da categoria
    public ?string $Descricao {

        // Executado ao definir valor para Descricao
        set {
            // Valida se a descrição possui ao menos 3 caracteres
            if (strlen($value) < 3)
                throw new Exception("Descricao deve ter no mínimo 3 caracteres.");

            // Salva o valor da descrição
            $this->Descricao = $value;
        }

        // Retorna o valor da descrição
        get => $this->Descricao ?? null;
    }

    /* Salva os dados da categoria no banco
     * Se possuir ID realiza UPDATE
     * Caso contrário realiza INSERT
     */
    function save(): Categoria
    {
        return new CategoriaDAO()->save($this);
    }

    // Busca uma categoria pelo ID
    function getById(int $id): ?Categoria
    {
        return new CategoriaDAO()->selectById($id);
    }

    // Busca todas as categorias cadastradas
    function getAllRows(): array
    {
        // Armazena os registros no atributo rows
        $this->rows = new CategoriaDAO()->select();
        return $this->rows;
    }

    // Remove uma categoria pelo ID
    function delete(int $id): bool
    {
        return new CategoriaDAO()->delete($id);
    }
}