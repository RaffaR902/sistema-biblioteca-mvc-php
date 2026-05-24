<?php

namespace App\Controller;

use App\Model\{ 
    Categoria,
    Livro,
    Autor
};
use Exception;

final class LivroController extends Controller
{
    // Ação principal da rota de Livros. Lista todos os registros.
    public static function index() : void
    {
        parent::isProtected(); // Garante que apenas logados acessem

        $model = new Livro();
        
        try {
            // Busca todos os livros no banco e preenche a propriedade $rows do Model
            $model->getAllRows();

        } catch(Exception $e) {
            $model->setError("Ocorreu um erro ao buscar os livros:");
            $model->setError($e->getMessage());
        }

        parent::render('Livro/lista_livro.php', $model); 
    } 

    // Gerencia tanto a exibição do formulário quanto o salvamento de novos registros e edições.
    public static function cadastro() : void
    {
        parent::isProtected(); 

        $model = new Livro();
        
        try
        {
            // Se a requisição for POST, significa que o formulário foi enviado
            if(parent::isPost())
            {
                // Preenche o model com os dados vindos do formulário
                // Se 'id' estiver vazio (novo registro), passa null. Caso contrário (edição), passa o ID.
                $model->Id = !empty($_POST['id']) ? $_POST['id'] : null;
                $model->Titulo = $_POST['titulo'];
                $model->Id_Categoria = $_POST['id_categoria'];
                $model->Isbn = $_POST['isbn'];
                $model->Ano = $_POST['ano'];
                $model->Editora = $_POST['editora'];
                $model->Id_Autores = $_POST['autor'];
                
                $model->save(); // Insere ou Atualiza dependendo do ID

                parent::redirect("/livro"); // Volta para a listagem após salvar

            } else {
                // Se não for POST (é um GET), verifica se existe um ID na URL para edição
                if(isset($_GET['id']))
                {              
                    // Busca os dados do livro específico para preencher o formulário
                    $model = $model->getById( (int) $_GET['id'] );
                }
            }

        } catch(Exception $e) {
            $model->setError($e->getMessage());
        }

        // Busca todas as categorias e autores para montar as tags <select> no formulário HTML da View
        $model->rows_categorias = new Categoria()->getAllRows();
        $model->rows_autores = new Autor()->getAllRows();

        parent::render('Livro/form_livro.php', $model);        
    } 
    
    // Remove um registro específico baseado no ID passado via URL (GET).
    public static function delete() : void
    {
        parent::isProtected(); 

        $model = new Livro();
        
        try 
        {
            $model->delete( (int) $_GET['id']);
            parent::redirect("/livro");

        } catch(Exception $e) {
            $model->setError("Ocorreu um erro ao excluir o livro:");
            $model->setError($e->getMessage());
        } 
        
        parent::render('Livro/lista_livro.php', $model);  
    }
}