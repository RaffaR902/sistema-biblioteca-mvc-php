CREATE DATABASE biblioteca;

USE biblioteca;

CREATE TABLE Autor (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(255) NOT NULL,
    Data_Nascimento DATE NOT NULL,
    CPF CHAR(11) NOT NULL
);

CREATE TABLE Categoria (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Descricao VARCHAR(100) NOT NULL
);

CREATE TABLE Livro (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Id_Categoria INT NOT NULL,
    Titulo VARCHAR(255) NOT NULL,
    Editora VARCHAR(150) NOT NULL,
    Ano YEAR NOT NULL,
    Isbn VARCHAR(100) NOT NULL,
    FOREIGN KEY (Id_Categoria) REFERENCES Categoria(Id)
);

CREATE TABLE Aluno (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(150),
    RA INT,
    Curso VARCHAR(150)
);

CREATE TABLE Usuario (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(150),
    Email VARCHAR(150),
    Senha VARCHAR(100)
);

CREATE TABLE Livro_Autor_Assoc (
    Id_Livro INT NOT NULL,
    Id_Autor INT NOT NULL,
    PRIMARY KEY (Id_Livro, Id_Autor),
    FOREIGN KEY (Id_Livro) REFERENCES Livro(Id),
    FOREIGN KEY (Id_Autor) REFERENCES Autor(Id)
);

CREATE TABLE Emprestimo (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Data_Emprestimo DATE DEFAULT (CURRENT_DATE),
    Data_Devolucao DATE,
    Id_Usuario INT NOT NULL,
    Id_Aluno INT NOT NULL,
    Id_Livro INT NOT NULL,
    FOREIGN KEY (Id_Usuario) REFERENCES Usuario(Id),
    FOREIGN KEY (Id_Aluno) REFERENCES Aluno(Id),
    FOREIGN KEY (Id_Livro) REFERENCES Livro(Id)
);

INSERT INTO Usuario (Nome, Email, Senha) VALUES ('adm', 'adm@admin', sha1('adm123'));