<?php

namespace App\DAO;

use App\Model\Emprestimo;

// Classe responsável pelas operações de banco de dados da entidade Empréstimo.
final class EmprestimoDAO extends DAO
{
    /**
     * Construtor da classe.
     * Chama o construtor da DAO para garantir a conexão com o banco.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Salva um empréstimo.
     * 
     * Se não existir ID:
     * -> INSERT
     * 
     * Se já existir ID:
     * -> UPDATE
     */
    public function save(Emprestimo $model): Emprestimo
    {
        return ($model->Id == null)
            ? $this->insert($model)
            : $this->update($model);
    }

    // Insere um novo empréstimo no banco.
    public function insert(Emprestimo $model): Emprestimo
    {
        $sql = "INSERT INTO emprestimo 
                (
                    id_usuario,
                    id_aluno,
                    id_livro,
                    data_emprestimo,
                    data_devolucao
                ) 
                VALUES 
                (?, ?, ?, ?, ?) ";

        // Prepara o SQL
        $stmt = parent::$conexao->prepare($sql);

        // Associa os valores aos parâmetros
        $stmt->bindValue(1, $model->Id_Usuario);
        $stmt->bindValue(2, $model->Id_Aluno);
        $stmt->bindValue(3, $model->Id_Livro);
        $stmt->bindValue(4, $model->Data_Emprestimo);
        $stmt->bindValue(5, $model->Data_Devolucao);

        // Executa o INSERT
        $stmt->execute();

        // Recupera o ID gerado automaticamente
        $model->Id = parent::$conexao->lastInsertId();

        return $model;
    }

    // Atualiza um empréstimo existente.
    public function update(Emprestimo $model): Emprestimo
    {
        $sql = "UPDATE emprestimo 
                SET 
                    id_aluno=?,
                    id_livro=?,
                    data_emprestimo=?,
                    data_devolucao=? 
                WHERE id=? ";

        // Prepara o SQL
        $stmt = parent::$conexao->prepare($sql);

        // Associa os valores
        $stmt->bindValue(1, $model->Id_Aluno);
        $stmt->bindValue(2, $model->Id_Livro);
        $stmt->bindValue(3, $model->Data_Emprestimo);
        $stmt->bindValue(4, $model->Data_Devolucao);
        $stmt->bindValue(5, $model->Id);

        // Executa o UPDATE
        $stmt->execute();

        return $model;
    }


    // Busca um empréstimo pelo ID.
    public function selectById(int $id): ?Emprestimo
    {
        $sql = "SELECT * FROM emprestimo WHERE id=? ";

        // Prepara o SQL
        $stmt = parent::$conexao->prepare($sql);

        // Define o ID
        $stmt->bindValue(1, $id);

        // Executa a consulta
        $stmt->execute();

        // Converte o resultado em objeto Emprestimo
        $model = $stmt->fetchObject("App\Model\Emprestimo");

        // Carrega os dados completos do aluno relacionado.
        $model->Dados_Aluno =
            new AlunoDAO()->selectById($model->Id_Aluno);

        // Carrega os dados completos do livro relacionado.
        $model->Dados_Livro =
            new LivroDAO()->selectById($model->Id_Livro);

        return $model;
    }

    // Retorna todos os empréstimos cadastrados.
    public function select(): array
    {
        $sql = "SELECT * FROM emprestimo ";

        // Prepara o SQL
        $stmt = parent::$conexao->prepare($sql);

        // Executa a consulta
        $stmt->execute();

        // Converte todos os registros em objetos Emprestimo.
        $arr_emprestimos =
            $stmt->fetchAll(
                DAO::FETCH_CLASS,
                "App\Model\Emprestimo"
            );

        // Para cada empréstimo, carrega os dados completos do aluno e do livro.
        foreach ($arr_emprestimos as $item)
        {
            $item->Dados_Aluno =
                new AlunoDAO()->selectById($item->Id_Aluno);

            $item->Dados_Livro =
                new LivroDAO()->selectById($item->Id_Livro);
        }

        return $arr_emprestimos;
    }

    // Remove um empréstimo pelo ID.
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM emprestimo WHERE id=? ";

        // Prepara o SQL
        $stmt = parent::$conexao->prepare($sql);

        // Define o ID
        $stmt->bindValue(1, $id);

        // Executa o DELETE
        return $stmt->execute();
    }

    /**
     * Conta quantos empréstimos ainda estão ativos.
     * Considera ativo todo empréstimo cuja data de devolução seja maior ou igual à data atual.
     */
    public function countAtivos(): int
    {
        $sql = "
        SELECT COUNT(*) AS total 
        FROM Emprestimo
        WHERE Data_Devolucao >= CURRENT_DATE";

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