<h1 align="center">DigiTeca - Sistema de Biblioteca em PHP MVC</h1>

<p align="center">
    <a href="#sobre-o-projeto">Sobre</a> |
    <a href="#objetivo-do-projeto">Objetivos</a> |
    <a href="#funcionalidades">Funcionalidades</a> |
    <a href="#tecnologias-utilizadas">Tecnologias Utilizadas</a> |
    <a href="#estrutura-do-projeto">Estrutura do Projeto</a> |
    <a href="#organização-das-pastas">Organização das Pastas</a> |
    <a href="#telas-do-sistema">Principais Telas</a> |
    <a href="#banco-de-dados">Banco de Dados</a> |
    <a href="#instalacao">Instalação</a> |
    <a href="#rotas-principais">Rotas Principais</a>
</p>

<p align="center">
    Sistema de gerenciamento de biblioteca desenvolvido em PHP puro com arquitetura MVC, MySQL e Bootstrap.
</p>

<p align="center">
    O projeto foi desenvolvido com foco em organização de código, CRUD completo, autenticação de usuário, relacionamento entre tabelas e interface responsiva.
</p>

---

<h2 id="sobre-o-projeto">Sobre o Projeto</h2>

O **DigiTeca** é um sistema web para gerenciamento de biblioteca desenvolvido com **PHP puro**, seguindo a arquitetura **MVC (Model-View-Controller)**.

Ele permite cadastrar, editar, listar e excluir os principais elementos de uma biblioteca, como:

- Alunos
- Livros
- Autores
- Categorias
- Empréstimos

Além disso, o sistema possui:

- Tela de login com controle de sessão
- Menu dinâmico
- Dashboard inicial com estatísticas
- Validação de dados
- Separação organizada entre Model, DAO, Controller e View

---

<h2 id="objetivo-do-projeto">Objetivo do Projeto</h2>

<p>Este projeto foi desenvolvido com fins de estudo e portfólio, com foco em:</p>

- arquitetura MVC
- programação orientada a objetos
- integração com banco relacional
- interface responsiva

---

<h2 id="funcionalidades">Funcionalidades</h2>

### Autenticação
- Login de usuário
- Logout
- Controle de sessão
- Lembrar usuário por cookie

### Tela inicial
- Mensagem de boas-vindas
- Cards com contagem de:
  - Livros cadastrados
  - Alunos cadastrados
  - Empréstimos ativos
  - Autores cadastrados
- Ações rápidas para navegação

### Alunos
- Cadastrar aluno
- Editar aluno
- Listar alunos
- Excluir aluno

### Livros
- Cadastrar livro
- Editar livro
- Listar livros
- Excluir livro
- Associar autores
- Definir categoria

### Autores
- Cadastrar autor
- Editar autor
- Listar autores
- Excluir autor

### Categorias
- Cadastrar categoria
- Editar categoria
- Listar categorias
- Excluir categoria

### Empréstimos
- Cadastrar empréstimo
- Editar empréstimo
- Listar empréstimos
- Excluir empréstimo
- Selecionar aluno e livro
- Definir data de empréstimo e devolução

---

<h2 id="tecnologias-utilizadas">Tecnologias Utilizadas</h2>

<table border="1" cellspacing="0" cellpadding="8">
    <thead>
        <tr>
            <th>Tipo</th>
            <th>Tecnologia</th>
            <th>Função</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Linguagem</td>
            <td>PHP</td>
            <td>Linguagem principal do sistema</td>
        </tr>
        <tr>
            <td>Banco de Dados</td>
            <td>MySQL</td>
            <td>Armazenamento dos dados da biblioteca</td>
        </tr>
        <tr>
            <td>Frontend</td>
            <td>HTML5</td>
            <td>Estrutura das páginas</td>
        </tr>
        <tr>
            <td>Estilização</td>
            <td>CSS3</td>
            <td>Estilização personalizada das telas</td>
        </tr>
        <tr>
            <td>Framework CSS</td>
            <td>Bootstrap 5</td>
            <td>Responsividade e componentes visuais</td>
        </tr>
        <tr>
            <td>Arquitetura</td>
            <td>MVC</td>
            <td>Organização do código em camadas</td>
        </tr>
        <tr>
            <td>Paradigma</td>
            <td>POO</td>
            <td>Estrutura orientada a objetos</td>
        </tr>
    </tbody>
</table>

---

<h2 id="estrutura-do-projeto">Estrutura do Projeto</h2>

```txt
App
├── Controller
├── DAO
├── Model
├── public
│   ├── css
│   └── img
├── View
├── autoload.php
├── config.php
├── index.php
└── routes.php

Modelagem Banco de Dados
└── modelo_fisico.sql
```

---

<h2 id="organização-das-pastas">Organização das pastas</h2>

<table border="1" cellspacing="0" cellpadding="8">
    <thead>
        <tr>
            <th>Pasta/Arquivo</th>
            <th>Função</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>App/Controller</td>
            <td>Controla as requisições e as regras de navegação</td>
        </tr>
        <tr>
            <td>App/DAO</td>
            <td>Responsável pelo acesso ao banco de dados</td>
        </tr>
        <tr>
            <td>App/Model</td>
            <td>Representa as entidades e validações do sistema</td>
        </tr>
        <tr>
            <td>App/View</td>
            <td>Contém as telas HTML/PHP da aplicação</td>
        </tr>
        <tr>
            <td>public/css</td>
            <td>Arquivos de estilo CSS</td>
        </tr>
        <tr>
            <td>public/img</td>
            <td>Imagens utilizadas nas telas</td>
        </tr>
        <tr>
            <td>autoload.php</td>
            <td>Carregamento automático das classes</td>
        </tr>
        <tr>
            <td>config.php</td>
            <td>Configurações do sistema e do banco</td>
        </tr>
        <tr>
            <td>index.php</td>
            <td>Arquivo de entrada da aplicação</td>
        </tr>
        <tr>
            <td>routes.php</td>
            <td>Definição das rotas do sistema</td>
        </tr>
        <tr>
            <td>modelo_fisico.sql</td>
            <td>Script da modelagem física do banco</td>
        </tr>
    </tbody>
</table>

---

<h2 id="telas-do-sistema">Principais Telas</h2>

### 🔐 Tela de Login
<p align="center">
    <img src="./Imagens Telas/tela_login.png" alt="Tela de login" width="900">
</p>

### 🏠 Tela Inicial
<p align="center">
    <img src="./Imagens Telas/tela_inicial.png" alt="Tela inicial" width="900">
</p>

### 🎓 Lista de Alunos
<p align="center">
    <img src="./Imagens Telas/lista_alunos.png" alt="Lista de alunos" width="900">
</p>

### 📚 Lista de Livros
<p align="center">
    <img src="./Imagens Telas/lista_livros.png" alt="Lista de livros" width="900">
</p>

### 🏷️ Lista de Categorias
<p align="center">
    <img src="./Imagens Telas/lista_categorias.png" alt="Lista de categorias" width="900">
</p>

### ✍️ Lista de Autores
<p align="center">
    <img src="./Imagens Telas/lista_autores.png" alt="Lista de autores" width="900">
</p>

### 📖 Lista de Empréstimos
<p align="center">
    <img src="./Imagens Telas/lista_emprestimo.png" alt="Lista de empréstimos" width="900">
</p>

---

<h2 id="banco-de-dados">Banco de Dados</h2>

O banco de dados do projeto foi modelado para atender os relacionamentos da biblioteca.

O script de criação está em:
```txt
Modelagem Banco de Dados/modelo_fisico.sql
```
<h3>Principais tabelas:</h3>

- `Aluno`
- `Autor`
- `Categoria`
- `Livro`
- `Livro_Autor_Assoc`
- `Emprestimo`
- `Usuario`

<h3>Relacionamentos:</h3>

- Um livro pertence a uma categoria
- Um livro pode ter vários autores
- Um autor pode estar associado a vários livros
- Um empréstimo relaciona usuário, aluno e livro

---

<h2 id="instalacao">Instalação</h2>

1. Clone o repositório:

```bash
git clone https://github.com/RaffaR902/sistema-biblioteca-mvc-php.git
```
2. Acesse a pasta do projeto

```bash
cd sistema-biblioteca-mvc-php
```

3. Importe o banco de dados

```txt
Execute o arquivo: "Modelagem Banco de Dados/modelo_fisico.sql" no seu MySQL.
```

4. Configure o arquivo de conexão no arquivo: `config.php`. Ajuste as credenciais do banco de dados conforme necessário.

5. Coloque o projeto no servidor local

6. Depois de configurar o banco e o servidor local, acesse o projeto no navegador.

---

<h2 id="rotas-principais">Rotas Principais</h2>

<table border="1" cellspacing="0" cellpadding="8">
    <thead>
        <tr>
            <th>Rota</th>
            <th>Função</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>/</code></td>
            <td>Tela inicial</td>
        </tr>
        <tr>
            <td><code>/login</code></td>
            <td>Tela de login</td>
        </tr>
        <tr>
            <td><code>/logout</code></td>
            <td>Encerrar sessão</td>
        </tr>
        <tr>
            <td><code>/aluno</code></td>
            <td>Lista de alunos</td>
        </tr>
        <tr>
            <td><code>/aluno/cadastro</code></td>
            <td>Cadastro/edição de aluno</td>
        </tr>
        <tr>
            <td><code>/autor</code></td>
            <td>Lista de autores</td>
        </tr>
        <tr>
            <td><code>/autor/cadastro</code></td>
            <td>Cadastro/edição de autor</td>
        </tr>
        <tr>
            <td><code>/categoria</code></td>
            <td>Lista de categorias</td>
        </tr>
        <tr>
            <td><code>/categoria/cadastro</code></td>
            <td>Cadastro/edição de categoria</td>
        </tr>
        <tr>
            <td><code>/livro</code></td>
            <td>Lista de livros</td>
        </tr>
        <tr>
            <td><code>/livro/cadastro</code></td>
            <td>Cadastro/edição de livro</td>
        </tr>
        <tr>
            <td><code>/emprestimo</code></td>
            <td>Lista de empréstimos</td>
        </tr>
        <tr>
            <td><code>/emprestimo/cadastro</code></td>
            <td>Cadastro/edição de empréstimo</td>
        </tr>
    </tbody>
</table>
