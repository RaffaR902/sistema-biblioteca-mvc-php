<?php

namespace App\Model;

use App\DAO\AlunoDAO;
use Exception;

final class Aluno extends Model
{
    // Armazena o ID do aluno
    public ?int $Id = null;

    // Propriedade Nome do aluno
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

    // Propriedade RA do aluno
    public ?string $RA {

        // Executado ao definir valor para RA
        set {
            // Verifica se o RA foi preenchido
            if (empty($value))
                throw new Exception("Preencha o RA");

            // Salva o valor do RA
            $this->RA = $value;
        }

        // Retorna o valor do RA
        get => $this->RA ?? null;
    }

    // Propriedade Curso do aluno
    public ?string $Curso {

        // Executado ao definir valor para Curso
        set {
            // Valida se o curso possui ao menos 3 caracteres
            if (strlen($value) < 3)
                throw new Exception("Curso deve ter no mínimo 3 caracteres.");

            // Salva o valor do curso
            $this->Curso = $value;
        }

        // Retorna o valor do curso
        get => $this->Curso ?? null;
    }

    /* Salva os dados do aluno no banco
     * Se possuir ID realiza UPDATE
     * Caso contrário realiza INSERT
     */
    function save(): Aluno
    {
        return new AlunoDAO()->save($this);
    }

    // Busca um aluno pelo ID
    function getById(int $id): ?Aluno
    {
        return new AlunoDAO()->selectById($id);
    }

    // Busca todos os alunos cadastrados
    function getAllRows(): array
    {
        // Armazena os registros no atributo rows
        $this->rows = new AlunoDAO()->select();
        return $this->rows;
    }

    // Remove um aluno pelo ID
    function delete(int $id): bool
    {
        return new AlunoDAO()->delete($id);
    }
}