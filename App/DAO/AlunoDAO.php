<?php

namespace App\DAO;

use App\Model\Aluno;

// DAO responsável pelas operações de banco de dados da entidade Aluno
final class AlunoDAO extends DAO
{
    // Construtor da classe.
    // Chama o construtor da classe pai para iniciar a conexão com o banco.
    public function __construct()
    {
        parent::__construct();
    }

    // Método responsável por decidir se será feito INSERT ou UPDATE.
    // Se o Id for nulo, insere um novo registro.
    // Caso contrário, atualiza um registro existente.
    public function save(Aluno $model): Aluno
    {
        return ($model->Id == null) ? $this->insert($model) : $this->update($model);
    }

    // Insere um novo aluno no banco de dados
    public function insert(Aluno $model): Aluno
    {
        // Comando SQL de inserção
        $sql = "INSERT INTO aluno (nome, ra, curso) VALUES (?, ?, ?) ";

        // Prepara o comando SQL
        $stmt = parent::$conexao->prepare($sql);

        // Associa os valores do Model aos parâmetros da query
        $stmt->bindValue(1, $model->Nome);
        $stmt->bindValue(2, $model->RA);
        $stmt->bindValue(3, $model->Curso);

        // Executa a query
        $stmt->execute();

        // Recupera o ID gerado automaticamente pelo banco
        $model->Id = parent::$conexao->lastInsertId();

        // Retorna o model atualizado
        return $model;
    }

    // Atualiza um aluno já existente
    public function update(Aluno $model): Aluno
    {
        // Comando SQL de atualização
        $sql = "UPDATE aluno SET nome=?, ra=?, curso=? WHERE id=? ";

        // Prepara a query
        $stmt = parent::$conexao->prepare($sql);

        // Associa os valores aos parâmetros
        $stmt->bindValue(1, $model->Nome);
        $stmt->bindValue(2, $model->RA);
        $stmt->bindValue(3, $model->Curso);
        $stmt->bindValue(4, $model->Id);

        // Executa a query
        $stmt->execute();

        // Retorna o model atualizado
        return $model;
    }

    // Busca um aluno pelo ID
    public function selectById(int $id): ?Aluno
    {
        // Query SQL para buscar um aluno específico
        $sql = "SELECT * FROM aluno WHERE id=? ";

        // Prepara a query
        $stmt = parent::$conexao->prepare($sql);

        // Associa o ID ao parâmetro
        $stmt->bindValue(1, $id);

        // Executa a query
        $stmt->execute();

        // Retorna o resultado convertido em objeto Aluno
        return $stmt->fetchObject("App\Model\Aluno");
    }

    // Retorna todos os alunos cadastrados
    public function select(): array
    {
        // Query SQL para buscar todos os registros
        $sql = "SELECT * FROM aluno ";

        // Prepara e executa a query
        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();

        // Retorna todos os registros como array de objetos Aluno
        return $stmt->fetchAll(DAO::FETCH_CLASS, "App\Model\Aluno");
    }

    // Remove um aluno do banco de dados
    public function delete(int $id): bool
    {
        // Query SQL de exclusão
        $sql = "DELETE FROM aluno WHERE id=? ";

        // Prepara a query
        $stmt = parent::$conexao->prepare($sql);

        // Associa o ID ao parâmetro
        $stmt->bindValue(1, $id);

        // Executa e retorna true/false
        return $stmt->execute();
    }

    // Retorna a quantidade total de alunos cadastrados
    public function count(): int
    {
        // Query SQL utilizando COUNT(*)
        $sql = "SELECT COUNT(*) AS total FROM Aluno";

        // Prepara a query
        $stmt = parent::$conexao->prepare($sql);

        // Executa a query
        $stmt->execute();

        // Recupera o resultado
        $resultado = $stmt->fetchObject();

        // Retorna apenas o valor inteiro da contagem
        return (int) $resultado->total;
    }
}