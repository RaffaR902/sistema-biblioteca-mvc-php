<?php

namespace App\DAO;

use App\Model\Livro;

// Classe responsável pelas operações de banco de dados da entidade Livro.
final class LivroDAO extends DAO
{
    /**
     * Construtor da classe.
     * Inicializa a conexão com o banco.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Salva um livro.
     * 
     * Se não possuir ID:
     * -> INSERT
     * 
     * Se já possuir ID:
     * -> UPDATE
     */
    public function save(Livro $model): Livro
    {
        return ($model->Id == null)
            ? $this->insert($model)
            : $this->update($model);
    }

    // Insere um novo livro no banco.
    public function insert(Livro $model): Livro
    {
        /**
         * Inicia uma transação.
         * Necessário porque serão feitas múltiplas operações relacionadas:
         * 
         * - Inserir livro
         * - Inserir autores associados
         */
        parent::$conexao->beginTransaction();

        // SQL para inserir o livro.
        $sql = "
            INSERT INTO livro
            (
                id_categoria,
                titulo,
                ano,
                editora,
                isbn
            )
            VALUES
            (?, ?, ?, ?, ?)
        ";

        // Prepara o SQL
        $stmt = parent::$conexao->prepare($sql);

        // Associa os valores
        $stmt->bindValue(1, $model->Id_Categoria);
        $stmt->bindValue(2, $model->Titulo);
        $stmt->bindValue(3, $model->Ano);
        $stmt->bindValue(4, $model->Editora);
        $stmt->bindValue(5, $model->Isbn);

        // Executa o INSERT
        $stmt->execute();

        // Recupera o ID gerado automaticamente.
        $model->Id = parent::$conexao->lastInsertId();

        // Insere os autores associados ao livro na tabela intermediária.
        foreach ($model->Id_Autores as $item)
        {
            $sql = "
                INSERT INTO livro_autor_assoc
                (id_livro, id_autor)
                VALUES
                (?, ?)
            ";

            $stmt = parent::$conexao->prepare($sql);

            $stmt->bindValue(1, $model->Id);
            $stmt->bindValue(2, $item);

            $stmt->execute();
        }

        // Confirma todas as alterações da transação.
        parent::$conexao->commit();

        return $model;
    }

    // Atualiza um livro existente.
    public function update(Livro $model): Livro
    {
        // Inicia transação para garantir integridade dos dados.
        parent::$conexao->beginTransaction();

        // Atualiza os dados principais do livro.
        $sql = "
            UPDATE livro 
            SET
                id_categoria=?,
                titulo=?,
                ano=?,
                editora=?,
                isbn=?
            WHERE id=?
        ";

        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $model->Id_Categoria);
        $stmt->bindValue(2, $model->Titulo);
        $stmt->bindValue(3, $model->Ano);
        $stmt->bindValue(4, $model->Editora);
        $stmt->bindValue(5, $model->Isbn);
        $stmt->bindValue(6, $model->Id);

        $stmt->execute();

        // Remove todas as associações antigas entre livro e autores.
        $sql = "
            DELETE FROM livro_autor_assoc
            WHERE id_livro = ?
        ";

        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $model->Id);

        $stmt->execute();

        // Insere novamente os autores selecionados no formulário.
        foreach ($model->Id_Autores as $item)
        {
            $sql = "
                INSERT INTO livro_autor_assoc
                (id_livro, id_autor)
                VALUES
                (?, ?)
            ";

            $stmt = parent::$conexao->prepare($sql);

            $stmt->bindValue(1, $model->Id);
            $stmt->bindValue(2, $item);

            $stmt->execute();
        }

        // Finaliza a transação.
        parent::$conexao->commit();

        return $model;
    }

    // Busca um livro pelo ID.
    public function selectById(int $id): ?Livro
    {
        $sql = "SELECT * FROM livro WHERE id=? ";

        // Prepara o SQL
        $stmt = parent::$conexao->prepare($sql);

        // Define o ID
        $stmt->bindValue(1, $id);

        // Executa a consulta
        $stmt->execute();

        // Converte o resultado em objeto Livro.
        $model = $stmt->fetchObject("App\Model\Livro");

        // Busca os autores associados ao livro.
        $sql = "
            SELECT *
            FROM livro_autor_assoc
            WHERE id_livro=?
        ";

        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        // Recupera todas as associações livro x autor.
        $livro_autores_assoc =
            $stmt->fetchAll(DAO::FETCH_CLASS);

        // Adiciona os IDs dos autores no array do model.
        foreach ($livro_autores_assoc as $item)
        {
            $model->Id_Autores[] = $item->Id_Autor;
        }

        return $model;
    }

    // Retorna todos os livros cadastrados.
    public function select(): array
    {
        $sql = "SELECT * FROM livro ";

        // Prepara o SQL
        $stmt = parent::$conexao->prepare($sql);

        // Executa a consulta
        $stmt->execute();

        // Converte todos os registros em objetos Livro.
        return $stmt->fetchAll(
            DAO::FETCH_CLASS,
            "App\Model\Livro"
        );
    }

    // Remove um livro pelo ID.
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM livro WHERE id=? ";

        // Prepara o SQL
        $stmt = parent::$conexao->prepare($sql);

        // Define o ID
        $stmt->bindValue(1, $id);

        // Executa o DELETE
        return $stmt->execute();
    }

    // Conta quantos livros existem cadastrados.
    public function count(): int
    {
        $sql = "SELECT COUNT(*) AS total FROM Livro";

        // Prepara o SQL
        $stmt = parent::$conexao->prepare($sql);

        // Executa a consulta
        $stmt->execute();

        // Recupera o resultado
        $resultado = $stmt->fetchObject();

        // Retorna o total convertido para inteiro
        return (int) $resultado->total;
    }
}