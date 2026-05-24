<?php

namespace App\Controller;

use App\Model\Categoria;
use Exception;

// Definida como 'final' para consolidar que não deve ser estendida.
final class CategoriaController extends Controller
{
    /**
     * Exibe a listagem de todas as categorias cadastradas.
     */
    public static function index() : void
    {
        // Proteção de rota padrão.
        parent::isProtected(); 

        // Instancia o objeto do Model Categoria.
        $model = new Categoria();
        
        try {
            // Consulta todas as linhas da tabela de categorias.
            $model->getAllRows();

        } catch(Exception $e) {
            // Armazena logs de erro amigáveis no objeto.
            $model->setError("Ocorreu um erro ao buscar as categorias:");
            $model->setError($e->getMessage());
        }

        // Carrega a tela com a grade de categorias.
        parent::render('Categoria/lista_categoria.php', $model); 
    } 

    /**
     * Trata a interface de inclusão/modificação e processa o envio dos dados de categorias.
     */
    public static function cadastro() : void
    {
        // Valida se o usuário tem permissão de acesso.
        parent::isProtected(); 

        $model = new Categoria();
        
        try
        {
            // Detecta se o formulário foi postado.
            if(parent::isPost())
            {
                // Configura o ID se existente (Update) ou nulo se inexistente (Insert).
                $model->Id = !empty($_POST['id']) ? $_POST['id'] : null;
                
                // Atribui o campo descrição vindo do formulário.
                $model->Descricao = $_POST['descricao'];
                
                // Grava as alterações no banco de dados.
                $model->save();

                // Redireciona o fluxo para a listagem geral.
                parent::redirect("/categoria");

            } else {
    
                // Caso seja uma requisição de leitura (GET), verifica se há parâmetro ID para carregar a entidade.
                if(isset($_GET['id']))
                {              
                    // Alimenta o model com os dados da categoria encontrada.
                    $model = $model->getById( (int) $_GET['id'] );
                }
            }

        } catch(Exception $e) {
            // Captura qualquer imprevisto e armazena para exibição na view.
            $model->setError($e->getMessage());
        }

        // Renderiza a página do formulário.
        parent::render('Categoria/form_categoria.php', $model);        
    } 
    
    /**
     * Remove fisicamente ou logicamente uma categoria do sistema.
     */
    public static function delete() : void
    {
        // Certifica de que há sessão ativa.
        parent::isProtected(); 

        $model = new Categoria();
        
        try 
        {
            // Executa o comando de exclusão baseado no id informado na URL.
            $model->delete( (int) $_GET['id']);
            
            // Retorna à listagem.
            parent::redirect("/categoria");

        } catch(Exception $e) {
            // Retém a mensagem de falha em caso de erros de integridade relacional.
            $model->setError("Ocorreu um erro ao excluir a categoria:");
            $model->setError($e->getMessage());
        } 
        
        // Exibe novamente a listagem contendo o erro tratado.
        parent::render('Categoria/lista_categoria.php', $model);  
    }
}