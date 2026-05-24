<?php

namespace App\Controller;

use App\Model\Autor;
use Exception;

// A classe é marcada como 'final' para que sua estrutura não seja modificada via herança.
final class AutorController extends Controller
{
    /**
     * Método responsável por listar todos os autores.
     */
    public static function index() : void
    {
        // Verifica se há uma sessão de usuário ativa.
        parent::isProtected(); 

        // Cria uma nova instância do modelo Autor.
        $model = new Autor();
        
        try {
            // Solicita ao Model que consulte o banco de dados e traga todos os autores.
            $model->getAllRows();

        } catch(Exception $e) {
            // Em caso de falha na consulta, armazena o erro no objeto.
            $model->setError("Ocorreu um erro ao buscar os autores:");
            $model->setError($e->getMessage());
        }

        // Envia o modelo com os dados (ou erros) para a tela de listagem de autores.
        parent::render('Autor/lista_autor.php', $model); 
    } 

    /**
     * Método responsável por exibir o formulário de cadastro/edição (GET)
     * e receber a submissão dos dados dos autores (POST).
     */
    public static function cadastro() : void
    {
        // Exige autenticação prévia para acessar esta funcionalidade.
        parent::isProtected(); 

        $model = new Autor();
        
        try
        {
            // Verifica se os dados foram submetidos via formulário (POST).
            if(parent::isPost())
            {
                // Se vier ID na requisição, define-o no Model para atualizar. Caso contrário, fica nulo para criar um novo registro.
                $model->Id = !empty($_POST['id']) ? $_POST['id'] : null;
                
                // Mapeia os dados enviados via formulário para as propriedades do objeto.
                $model->Nome = $_POST['nome'];
                $model->Data_Nascimento = $_POST['data_nascimento'];
                $model->CPF = $_POST['cpf'];
                
                // Executa a persistência dos dados no banco.
                $model->save();

                // Redireciona para a listagem principal de autores após salvar.
                parent::redirect("/autor");

            } else {
    
                // Se for uma requisição GET ordinária, verifica se um ID foi passado para edição.
                if(isset($_GET['id']))
                {              
                    // Carrega os dados específicos do autor selecionado para edição.
                    $model = $model->getById( (int) $_GET['id'] );
                }
            }

        } catch(Exception $e) {
            // Guarda qualquer mensagem de erro ocorrida durante o processo.
            $model->setError($e->getMessage());
        }

        // Apresenta a tela do formulário de autor com o estado atual do Model.
        parent::render('Autor/form_autor.php', $model);        
    } 
    
    /**
     * Método responsável por apagar um autor a partir do ID contido na URL.
     */
    public static function delete() : void
    {
        // Bloqueia acessos de usuários não autenticados.
        parent::isProtected(); 

        $model = new Autor();
        
        try 
        {
            // Aciona o método de deleção passando o ID sanitizado como inteiro.
            $model->delete( (int) $_GET['id']);
            
            // Retorna para a página de listagem em caso de sucesso.
            parent::redirect("/autor");

        } catch(Exception $e) {
            // Guarda mensagens de erro caso o banco rejeite a exclusão.
            $model->setError("Ocorreu um erro ao excluir o autor:");
            $model->setError($e->getMessage());
        } 
        
        // Em caso de falha, recarrega a listagem mostrando o erro ocorrido.
        parent::render('Autor/lista_autor.php', $model);  
    }
}