<?php

namespace App\DAO;

use App\Model\Autor;

// DAO responsável pelas operações de banco de dados da entidade Autor
final class AutorDAO extends DAO
{
    // Construtor da classe.
    // Chama o construtor da classe pai para iniciar a conexão com o banco.
    public function __construct()
    {
        parent::__construct();
    }

    // Método responsável por decidir entre INSERT e UPDATE.
    // Se o Id estiver nulo, insere um novo autor.
    // Caso contrário, atualiza um autor existente.
    public function save(Autor $model): Autor
    {
        return ($model->Id == null) ? $this->insert($model) : $this->update($model);
    }

    // Insere um novo autor no banco de dados
    public function insert(Autor $model): Autor
    {
        // Query SQL de inserção
        $sql = "INSERT INTO autor (nome, data_nascimento, cpf) VALUES (?, ?, ?) ";

        // Prepara a query
        $stmt = parent::$conexao->prepare($sql);

        // Associa os valores aos parâmetros da query
        $stmt->bindValue(1, $model->Nome);
        $stmt->bindValue(2, $model->Data_Nascimento);
        $stmt->bindValue(3, $model->CPF);

        // Executa a query
        $stmt->execute();

        // Recupera o ID gerado automaticamente
        $model->Id = parent::$conexao->lastInsertId();

        // Retorna o model atualizado
        return $model;
    }

    // Atualiza um autor já existente
    public function update(Autor $model): Autor
    {
        // Query SQL de atualização
        $sql = "UPDATE autor SET nome=?, data_nascimento=?, cpf=? WHERE id=? ";

        // Prepara a query
        $stmt = parent::$conexao->prepare($sql);

        // Associa os valores aos parâmetros
        $stmt->bindValue(1, $model->Nome);
        $stmt->bindValue(2, $model->Data_Nascimento);
        $stmt->bindValue(3, $model->CPF);
        $stmt->bindValue(4, $model->Id);

        // Executa a query
        $stmt->execute();

        // Retorna o model atualizado
        return $model;
    }

    // Busca um autor pelo ID
    public function selectById(int $id): ?Autor
    {
        // Query SQL para buscar um registro específico
        $sql = "SELECT * FROM autor WHERE id=? ";

        // Prepara a query
        $stmt = parent::$conexao->prepare($sql);

        // Associa o ID ao parâmetro
        $stmt->bindValue(1, $id);

        // Executa a query
        $stmt->execute();

        // Retorna o resultado convertido em objeto Autor
        return $stmt->fetchObject("App\Model\Autor");
    }

    // Retorna todos os autores cadastrados
    public function select(): array
    {
        // Query SQL para buscar todos os registros
        $sql = "SELECT * FROM autor ";

        // Prepara e executa a query
        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();

        // Retorna todos os registros em formato de array de objetos Autor
        return $stmt->fetchAll(DAO::FETCH_CLASS, "App\Model\Autor");
    }

    // Remove um autor do banco de dados
    public function delete(int $id): bool
    {
        // Query SQL de exclusão
        $sql = "DELETE FROM autor WHERE id=? ";

        // Prepara a query
        $stmt = parent::$conexao->prepare($sql);

        // Associa o ID ao parâmetro
        $stmt->bindValue(1, $id);

        // Executa e retorna true/false
        return $stmt->execute();
    }

    // Retorna a quantidade total de autores cadastrados
    public function count(): int
    {
        // Query SQL utilizando COUNT(*)
        $sql = "SELECT COUNT(*) AS total FROM Autor";

        // Prepara a query
        $stmt = parent::$conexao->prepare($sql);

        // Executa a query
        $stmt->execute();

        // Recupera o resultado da contagem
        $resultado = $stmt->fetchObject();

        // Retorna apenas o valor inteiro da contagem
        return (int) $resultado->total;
    }
}