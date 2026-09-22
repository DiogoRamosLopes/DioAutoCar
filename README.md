# DioAutoCar - Sistema de Gerenciamento de Loja de Carros e Motos

![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4)
![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-4479A1)
![License](https://img.shields.io/badge/license-MIT-green)

Sistema web desenvolvido em PHP para gerenciamento completo de uma loja de veículos (carros e motos), incluindo controle de clientes, fornecedores, funcionários e produtos.

## Índice

- [Sobre o Projeto](#sobre-o-projeto)
- [Funcionalidades](#funcionalidades)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Estrutura do Projeto](#estrutura-do-projeto)
- [Pré-requisitos](#pré-requisitos)
- [Instalação](#instalação)
- [Banco de Dados](#banco-de-dados)
- [Screenshots](#screenshots)
- [Roadmap](#roadmap)
- [Contribuições](#contribuições)
- [Autor](#autor)
- [Licença](#licença)

## Sobre o Projeto

Este é um sistema CRUD (Create, Read, Update, Delete) que permite o gerenciamento eficiente dos dados de uma loja de veículos. O sistema foi desenvolvido como projeto acadêmico para praticar conceitos de desenvolvimento web com PHP e banco de dados MySQL.

## Funcionalidades

### Clientes
- Cadastro de clientes
- Consulta de clientes
- Alteração de dados
- Exclusão de registros

### Fornecedores
- Cadastro de fornecedores
- Consulta de fornecedores
- Alteração de dados
- Exclusão de registros

### Funcionários
- Cadastro de funcionários
- Consulta de funcionários
- Alteração de dados
- Exclusão de registros

### Produtos (Veículos)
- Cadastro de veículos
- Consulta de veículos
- Alteração de dados
- Exclusão de registros
- Upload de imagens dos veículos

## Tecnologias Utilizadas

- **PHP** — linguagem de programação back-end
- **MySQL** — banco de dados
- **HTML5** — estrutura das páginas
- **CSS3** — estilização
- **JavaScript** — interatividade

## Estrutura do Projeto

```
├── index.php                       # Página inicial
├── menu.php                        # Menu de navegação
├── loja.php                        # Página da loja
├── logo.png                        # Logotipo do sistema
│
├── cadastroCliente.php             # Formulário de cadastro de cliente
├── cadastroFornecedor.php          # Formulário de cadastro de fornecedor
├── cadastroFuncionario.php         # Formulário de cadastro de funcionário
├── cadastroProduto.php             # Formulário de cadastro de produto
│
├── recebeDados.php                 # Processa dados de cliente
├── recebeDadosFornecedor.php       # Processa dados de fornecedor
├── recebeDadosFuncionarios.php     # Processa dados de funcionário
├── recebeDadosProdutos.php         # Processa dados de produto
├── salvarProduto.php               # Salva produto com upload
│
├── consultaCliente.php             # Consulta clientes
├── consultaFornecedor.php          # Consulta fornecedores
├── consultaFuncionario.php         # Consulta funcionários
├── consultaProduto.php             # Consulta produtos
│
├── alterarCliente.php              # Formulário de alteração de cliente
├── alterarFornecedor.php           # Formulário de alteração de fornecedor
├── alterarFuncionario.php          # Formulário de alteração de funcionário
├── alterarProduto.php              # Formulário de alteração de produto
│
├── confirmaAlterarCliente.php      # Confirma alteração de cliente
├── confirmaAlterarFornecedor.php   # Confirma alteração de fornecedor
├── confirmaAlterarFuncionario.php  # Confirma alteração de funcionário
├── confirmaAlterarProduto.php      # Confirma alteração de produto
│
├── confirmarExcluir.php            # Confirma exclusão
├── excluirRegistro.php             # Exclui registro
└── teste_upload.php                # Teste de upload de arquivos
```

## Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina:

- [PHP 7.4+](https://www.php.net/downloads)
- [MySQL 5.7+](https://dev.mysql.com/downloads/)
- [XAMPP](https://www.apachefriends.org/) ou [WAMP](https://www.wampserver.com/) (recomendado)
- [Git](https://git-scm.com/)

## Instalação

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/DiogoRamosLopes/DioAutoCar.git
   ```

2. **Mova os arquivos para o diretório do servidor:**
   - XAMPP: `C:\xampp\htdocs\DioAutoCar\`
   - WAMP: `C:\wamp64\www\DioAutoCar\`

3. **Inicie o Apache e o MySQL** pelo painel do XAMPP/WAMP.

4. **Crie o banco de dados e as tabelas.** O banco utilizado se chama `oficina`:
   ```sql
   CREATE DATABASE oficina;
   ```
   Depois crie as tabelas (`tb_cliente`, `tb_fornecedor`, `tb_funcionario`, `tb_produto`) com a estrutura usada pelo sistema — veja a seção [Banco de Dados](#banco-de-dados).

5. **Configure a conexão com o banco.** O projeto não tem um arquivo de conexão único: cada arquivo `recebeDados*.php` (`recebeDados.php`, `recebeDadosFornecedor.php`, `recebeDadosFuncionarios.php`, `recebeDadosProdutos.php`) abre sua própria conexão via PDO. Se o usuário/senha/host do seu MySQL forem diferentes, ajuste em **cada um** desses arquivos:
   ```php
   $servidor = "localhost:3306";
   $usuario  = "root";
   $senha    = "";

   $conexao = new PDO("mysql:host=$servidor;dbname=oficina", $usuario, $senha);
   ```

6. **Acesse no navegador:**
   ```
   http://localhost/DioAutoCar/
   ```

## Banco de Dados

O sistema utiliza o banco de dados **`oficina`** (MySQL), com as seguintes tabelas:

| Tabela           | Descrição                              |
|------------------|------------------------------------------|
| `tb_cliente`     | Dados dos clientes cadastrados          |
| `tb_fornecedor`  | Dados dos fornecedores                  |
| `tb_funcionario` | Dados dos funcionários da loja          |
| `tb_produto`     | Veículos (carros e motos) disponíveis   |

Exemplo da estrutura da tabela `tb_cliente`, com base no cadastro do sistema:

```sql
CREATE TABLE tb_cliente (
    id       INT AUTO_INCREMENT PRIMARY KEY,
    nome     VARCHAR(100),
    cpf      VARCHAR(14),
    rg       VARCHAR(20),
    celular  VARCHAR(20),
    email    VARCHAR(100),
    cep      VARCHAR(10),
    numero   VARCHAR(10)
);
```

> As demais tabelas (`tb_fornecedor`, `tb_funcionario`, `tb_produto`) seguem o mesmo princípio, com colunas de acordo com os campos de cada formulário de cadastro. Recomendo criar um arquivo `database.sql` na raiz do projeto com o `CREATE TABLE` de todas elas, para facilitar a instalação por outras pessoas.

## Screenshots

**Tela de login**

![Tela de login](./screenshots/tela-login.jpg)

**Produtos em destaque (responsivo: desktop e mobile)**

![Produtos em destaque](./screenshots/produtos-destaque.jpg)

## Roadmap

Ideias de melhorias futuras para o projeto:

- [ ] Autenticação e login de usuários (admin/funcionário)
- [ ] Uso de *prepared statements* (PDO) em vez de concatenar variáveis direto no SQL, para evitar SQL Injection
- [ ] Validação de formulários no front-end (JavaScript)
- [ ] Paginação nas telas de consulta
- [ ] Relatórios em PDF (vendas, estoque)
- [ ] Dashboard com indicadores (total de veículos, clientes, etc.)

## Contribuições

Contribuições são bem-vindas! Para contribuir:

1. Faça um **Fork** do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/NovaFeature`)
3. Commit suas mudanças (`git commit -m 'Adiciona nova feature'`)
4. Push para a branch (`git push origin feature/NovaFeature`)
5. Abra um **Pull Request**

## Autor

**Diogo Ramos Lopes**

- GitHub: [@DiogoRamosLopes](https://github.com/DiogoRamosLopes)
- LinkedIn: [Diogo Ramos Lopes](https://www.linkedin.com/in/diogo-ramos-lopes-335808353/)

### Agradecimentos

Projeto desenvolvido durante o curso técnico de Informática na ETEC.
<!-- Professor(a): Marcelo Batista Onuki -->

