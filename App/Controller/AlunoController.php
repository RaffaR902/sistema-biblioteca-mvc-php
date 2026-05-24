<?php

namespace App\Controller;

use App\Model\Aluno;
use Exception;

// A palavra-chave 'final' impede que esta classe seja herdada por outra.
final class AlunoController extends Controller
{
    /**
     * Método responsável por listar todos os alunos.
     */
    public static function index() : void
    {
        // Verifica se o usuário está logado. Se não estiver, a classe pai (Controller) redireciona para o login.
        parent::isProtected(); 

        // Instancia o modelo Aluno para interagir com a tabela de alunos no banco de dados.
        $model = new Aluno();
        
        try {
            // Executa o método do Model que busca todos os registros do banco de dados.
            $model->getAllRows();

        } catch(Exception $e) {
            // Caso ocorra algum erro no banco (conexão, sintaxe, etc.), captura a mensagem de erro.
            $model->setError("Ocorreu um erro ao buscar os alunos:");
            $model->setError($e->getMessage());
        }

        // Chama o método da classe pai para incluir a View de listagem, passando o modelo preenchido.
        parent::render('Aluno/lista_aluno.php', $model); 
    } 

    /**
     * Método responsável tanto por exibir o formulário de cadastro/edição (GET)
     * quanto por salvar os dados enviados por ele (POST).
     */
    public static function cadastro() : void
    {
        // Garante a segurança da rota, exigindo autenticação.
        parent::isProtected(); 

        $model = new Aluno();
        
        try
        {
            // Verifica se a requisição atual é do tipo POST (envio de formulário).
            if(parent::isPost())
            {
                // Se o campo 'id' não estiver vazio, armazena ele (indica uma Edição). Se estiver vazio, define como null (Novo Registro).
                $model->Id = !empty($_POST['id']) ? $_POST['id'] : null;
                
                // Preenche as propriedades do objeto Model com os dados enviados pelo formulário.
                $model->Nome = $_POST['nome'];
                $model->RA = $_POST['ra'];
                $model->Curso = $_POST['curso'];
                
                // Salva no banco de dados. O próprio Model decide internamente se fará um INSERT ou um UPDATE com base no ID.
                $model->save();

                // Após salvar com sucesso, redireciona o usuário de volta para a tela de listagem.
                parent::redirect("/aluno");

            } else {
    
                // Se a requisição NÃO for POST (ou seja, é um GET), verifica se há um ID na URL para edição.
                if(isset($_GET['id']))
                {              
                    // Busca os dados do aluno específico no banco transformando o ID em inteiro por segurança.
                    $model = $model->getById( (int) $_GET['id'] );
                }
            }

        } catch(Exception $e) {
            // Captura qualquer exceção gerada no processo e armazena no objeto para ser exibida na View.
            $model->setError($e->getMessage());
        }

        // Renderiza o formulário (seja ele vazio para um novo cadastro ou preenchido para uma edição).
        parent::render('Aluno/form_aluno.php', $model);        
    } 
    
    /**
     * Método responsável por excluir um aluno através do ID fornecido na URL.
     */
    public static function delete() : void
    {
        // Protege a rota contra acessos não autorizados.
        parent::isProtected(); 

        $model = new Aluno();
        
        try 
        {
            // Executa a exclusão no banco convertendo o parâmetro da URL em inteiro.
            $model->delete( (int) $_GET['id']);
            
            // Se der certo, redireciona para atualizar a lista limpa.
            parent::redirect("/aluno");

        } catch(Exception $e) {
            // Se houver erro (ex: aluno vinculado a um empréstimo ativo), guarda as mensagens de erro.
            $model->setError("Ocorreu um erro ao excluir o aluno:");
            $model->setError($e->getMessage());
        } 
        
        // Se a exclusão falhar, renderiza novamente a página de listagem exibindo a mensagem de erro tratada.
        parent::render('Aluno/lista_aluno.php', $model);  
    }
}