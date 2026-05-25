-- Cria o banco de dados da biblioteca
CREATE DATABASE biblioteca;

-- Seleciona o banco de dados para uso
USE biblioteca;

-- =====================================================
-- TABELA: Autor
-- Armazena os dados dos autores dos livros
-- =====================================================
CREATE TABLE Autor (
    -- Identificador único do autor
    Id INT AUTO_INCREMENT PRIMARY KEY,

    -- Nome completo do autor
    Nome VARCHAR(255) NOT NULL,

    -- Data de nascimento do autor
    Data_Nascimento DATE NOT NULL,

    -- CPF do autor
    CPF CHAR(11) NOT NULL
);

-- =====================================================
-- TABELA: Categoria
-- Armazena as categorias/gêneros dos livros
-- =====================================================
CREATE TABLE Categoria (
    -- Identificador único da categoria
    Id INT AUTO_INCREMENT PRIMARY KEY,

    -- Descrição da categoria
    Descricao VARCHAR(100) NOT NULL
);

-- =====================================================
-- TABELA: Livro
-- Armazena os dados dos livros cadastrados
-- =====================================================
CREATE TABLE Livro (
    -- Identificador único do livro
    Id INT AUTO_INCREMENT PRIMARY KEY,

    -- Chave estrangeira da categoria do livro
    Id_Categoria INT NOT NULL,

    -- Título do livro
    Titulo VARCHAR(255) NOT NULL,

    -- Nome da editora
    Editora VARCHAR(150) NOT NULL,

    -- Ano de publicação do livro
    Ano YEAR NOT NULL,

    -- Código ISBN do livro
    Isbn VARCHAR(100) NOT NULL,

    -- Relacionamento com a tabela Categoria
    FOREIGN KEY (Id_Categoria) REFERENCES Categoria(Id)
);

-- =====================================================
-- TABELA: Aluno
-- Armazena os alunos que podem realizar empréstimos
-- =====================================================
CREATE TABLE Aluno (
    -- Identificador único do aluno
    Id INT AUTO_INCREMENT PRIMARY KEY,

    -- Nome do aluno
    Nome VARCHAR(150),

    -- Registro Acadêmico do aluno
    RA INT,

    -- Curso do aluno
    Curso VARCHAR(150)
);

-- =====================================================
-- TABELA: Usuario
-- Armazena os usuários do sistema (bibliotecários/admin)
-- =====================================================
CREATE TABLE Usuario (
    -- Identificador único do usuário
    Id INT AUTO_INCREMENT PRIMARY KEY,

    -- Nome do usuário
    Nome VARCHAR(150),

    -- Email de acesso
    Email VARCHAR(150),

    -- Senha criptografada do usuário
    Senha VARCHAR(100)
);

-- =====================================================
-- TABELA: Livro_Autor_Assoc
-- Faz a associação entre livros e autores
-- (Relacionamento muitos-para-muitos)
-- =====================================================
CREATE TABLE Livro_Autor_Assoc (
    -- ID do livro associado
    Id_Livro INT NOT NULL,

    -- ID do autor associado
    Id_Autor INT NOT NULL,

    -- Chave primária composta
    PRIMARY KEY (Id_Livro, Id_Autor),

    -- Relacionamento com a tabela Livro
    FOREIGN KEY (Id_Livro) REFERENCES Livro(Id),

    -- Relacionamento com a tabela Autor
    FOREIGN KEY (Id_Autor) REFERENCES Autor(Id)
);

-- =====================================================
-- TABELA: Emprestimo
-- Registra os empréstimos de livros
-- =====================================================
CREATE TABLE Emprestimo (
    -- Identificador único do empréstimo
    Id INT AUTO_INCREMENT PRIMARY KEY,

    -- Data em que o empréstimo foi realizado
    -- Por padrão recebe a data atual
    Data_Emprestimo DATE DEFAULT (CURRENT_DATE),

    -- Data prevista ou realizada para devolução
    Data_Devolucao DATE,

    -- Usuário responsável pelo empréstimo
    Id_Usuario INT NOT NULL,

    -- Aluno que realizou o empréstimo
    Id_Aluno INT NOT NULL,

    -- Livro emprestado
    Id_Livro INT NOT NULL,

    -- Relacionamento com a tabela Usuario
    FOREIGN KEY (Id_Usuario) REFERENCES Usuario(Id),

    -- Relacionamento com a tabela Aluno
    FOREIGN KEY (Id_Aluno) REFERENCES Aluno(Id),

    -- Relacionamento com a tabela Livro
    FOREIGN KEY (Id_Livro) REFERENCES Livro(Id)
);

-- =====================================================
-- INSERÇÃO DE USUÁRIO PADRÃO
-- Cria um usuário administrador inicial
-- Senha criptografada utilizando SHA1
-- =====================================================
INSERT INTO Usuario (Nome, Email, Senha) VALUES ('adm', 'adm@admin', sha1('adm123'));