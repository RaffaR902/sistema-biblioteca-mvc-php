<?php

namespace App\Controller;

// Importa os modelos necessários para o funcionamento desta regra de negócio.
use App\Model\{ Emprestimo, Aluno, Livro };
use Exception;

final class EmprestimoController extends Controller
{
    /**
     * Lista todos os empréstimos registrados no sistema.
     */
    public static function index() : void
    {
        // Bloqueia acessos anônimos.
        parent::isProtected(); 

        $model = new Emprestimo();
        
        try {
            // Busca o histórico/lista de empréstimos.
            $model->getAllRows();

        } catch(Exception $e) {
            // Tratamento de erros de leitura do banco.
            $model->setError("Ocorreu um erro ao buscar os emprestimos:");
            $model->setError($e->getMessage());
        }

        // Renderiza a listagem de empréstimos.
        parent::render('Emprestimo/lista_emprestimo.php', $model); 
    } 

    /**
     * Gerencia a tela de concessão/edição de empréstimos.
     */
    public static function cadastro() : void
    {
        // Validação de segurança.
        parent::isProtected(); 

        $model = new Emprestimo();
        
        try
        {
            // Verifica se o formulário de empréstimo foi submetido.
            if(parent::isPost())
            {
                // Define o ID (Edição) ou nulo (Novo Empréstimo).
                $model->Id = !empty($_POST['id']) ? $_POST['id'] : null;
                
                // Mapeia chaves estrangeiras informadas no formulário (Aluno e Livro).
                $model->Id_Aluno = $_POST['id_aluno'];
                $model->Id_Livro = $_POST['id_livro'];
                
                // Diferencial: Captura de forma estática o ID do usuário atualmente logado no sistema.
                // Isso registra automaticamente quem foi o funcionário/bibliotecário que efetuou a operação.
                $model->Id_Usuario = LoginController::getUsuario()->Id;
                
                // Define as datas do ciclo de empréstimo.
                $model->Data_Emprestimo = $_POST['data_emprestimo'];
                $model->Data_Devolucao = $_POST['data_devolucao'];           
                
                // Salva o registro.
                $model->save();

                // Redireciona para a listagem.
                parent::redirect("/emprestimo");

            } else {
    
                // Se for uma requisição GET, verifica se é para carregar dados de um empréstimo existente.
                if(isset($_GET['id']))
                {              
                    $model = $model->getById( (int) $_GET['id'] );
                }
            }

        } catch(Exception $e) {
            // Armazena falhas de validação ou de banco.
            $model->setError($e->getMessage());
        }

        // IMPORTANTE: Para que o formulário da View exiba caixas de seleção (combobox/select)
        // contendo os alunos e os livros disponíveis, instanciamos dinamicamente esses modelos
        // e populamos propriedades temporárias no nosso modelo principal de Empréstimo.
        $model->rows_alunos = new Aluno()->getAllRows();
        $model->rows_livros = new Livro()->getAllRows();

        // Envia a tela do formulário contendo o empréstimo e as listagens auxiliares de alunos e livros.
        parent::render('Emprestimo/form_emprestimo.php', $model);        
    } 
    
    /**
     * Remove um empréstimo do sistema.
     */
    public static function delete() : void
    {
        // Garante a sessão.
        parent::isProtected(); 

        $model = new Emprestimo();
        
        try 
        {
            // Apaga o registro com base no ID da URL.
            $model->delete( (int) $_GET['id']);
            
            // Retorna em caso de sucesso.
            parent::redirect("/emprestimo");

        } catch(Exception $e) {
            // Captura erros (ex: restrições do banco).
            $model->setError("Ocorreu um erro ao excluir o emprestimo:");
            $model->setError($e->getMessage());
        } 
        
        // Recarrega a listagem mostrando o erro caso a deleção falhe.
        parent::render('Emprestimo/lista_emprestimo.php', $model);  
    }
}