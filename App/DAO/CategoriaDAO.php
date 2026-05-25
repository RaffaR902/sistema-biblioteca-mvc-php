<?php

namespace App\DAO;

use App\Model\Categoria;

// DAO responsável pelas operações de banco de dados da entidade Categoria
final class CategoriaDAO extends DAO
{
    // Construtor da classe.
    // Chama o construtor da classe pai para iniciar a conexão com o banco.
    public function __construct()
    {
        parent::__construct();
    }

    // Método responsável por decidir entre INSERT e UPDATE.
    // Se o Id estiver nulo, insere uma nova categoria.
    // Caso contrário, atualiza uma categoria existente.
    public function save(Categoria $model) : Categoria
    {
        return ($model->Id == null) ? $this->insert($model) : $this->update($model);
    }

    // Insere uma nova categoria no banco de dados
    public function insert(Categoria $model) : Categoria
    {
        // Query SQL de inserção
        $sql = "INSERT INTO categoria (descricao) VALUES (?) ";

        // Prepara a query
        $stmt = parent::$conexao->prepare($sql);
        
        // Associa o valor ao parâmetro
        $stmt->bindValue(1, $model->Descricao);

        // Executa a query
        $stmt->execute();

        // Recupera o ID gerado automaticamente
        $model->Id = parent::$conexao->lastInsertId();
        
        // Retorna o model atualizado
        return $model;
    }

    // Atualiza uma categoria já existente
    public function update(Categoria $model) : Categoria
    {
        // Query SQL de atualização
        $sql = "UPDATE categoria SET descricao=? WHERE id=? ";

        // Prepara a query
        $stmt = parent::$conexao->prepare($sql);

        // Associa os valores aos parâmetros
        $stmt->bindValue(1, $model->Descricao);
        $stmt->bindValue(2, $model->Id);

        // Executa a query
        $stmt->execute();
        
        // Retorna o model atualizado
        return $model;
    }

    // Busca uma categoria pelo ID
    public function selectById(int $id) : ?Categoria
    {
        // Query SQL para buscar uma categoria específica
        $sql = "SELECT * FROM categoria WHERE id=? ";

        // Prepara a query
        $stmt = parent::$conexao->prepare($sql);

        // Associa o ID ao parâmetro
        $stmt->bindValue(1, $id);

        // Executa a query
        $stmt->execute();

        // Retorna o resultado convertido em objeto Categoria
        return $stmt->fetchObject("App\Model\Categoria");
    }

    // Retorna todas as categorias cadastradas
    public function select() : array
    {
        // Query SQL para buscar todos os registros
        $sql = "SELECT * FROM categoria ";

        // Prepara e executa a query
        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();

        // Retorna todos os registros como array de objetos Categoria
        return $stmt->fetchAll(DAO::FETCH_CLASS, "App\Model\Categoria");
    }

    // Remove uma categoria do banco de dados
    public function delete(int $id) : bool
    {
        // Query SQL de exclusão
        $sql = "DELETE FROM categoria WHERE id=? ";

        // Prepara a query
        $stmt = parent::$conexao->prepare($sql);

        // Associa o ID ao parâmetro
        $stmt->bindValue(1, $id);

        // Executa e retorna true/false
        return $stmt->execute();
    }
}