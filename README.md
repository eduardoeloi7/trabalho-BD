PASSO A PASSO PARA UTILIZAÇÂO DO CÓDIGO:

1- CRIE O BANCO DE DADOS USANDO O ARQUIVO SQL (BD loja trabalho.sql)
2- ACESSE A PASTA "trabalhoBD" E CRIE OS ARQUIVOS .php COM SEUS RESPECTIVOS NOMES E COLE OS CÓDIGOS
3 - ACESSE "http://localhost/CRUD/trabalhoBD/" PELO NAVEGADOR

EXPLICAÇÃO DO PROJETO:

Sistema CRUD - Loja de Skins CS2

Este projeto consiste em um sistema completo de cadastro e gerenciamento de vendedores e produtos de skins de CS2, utilizando o padrão CRUD (Create, Read, Update, Delete).


Funcionalidades

- Cadastro de vendedores
- Cadastro de produtos (com imagem)
- Edição de dados
- Exclusão de registros
- Consulta/listagem de produtos e vendedores


Explicação das Funções

Estrutura do Projeto:

Página/Arquivo           | Função                                                                 
conexao.php           | Conecta ao banco de dados MySQL                                       
cadvendedor.php        | Formulário para **cadastrar** um novo vendedor                       
cadproduto.php        | Formulário para **cadastrar** um novo produto com imagem              
vendedorpage.php       | Lista todos os vendedores cadastrados                                 
produtopage.php      | Lista todos os produtos com detalhes e imagem                         
editarvendedor.php   | Exibe formulário com dados atuais do vendedor para edição             
atualizarvendedor.php  | Processa a **atualização** do vendedor no banco                       
excluirvendedor.php    | Remove o vendedor do banco usando seu ID                              
vendedorconsulta.php   | Permite consultar vendedores pelo nome                                
produtoconsulta.php    | Permite consultar produtos pelo nome ou tipo                          
uploads/               | Pasta onde ficam as imagens enviadas dos produtos                     
logo_skins.png         | Logotipo exibido nas páginas                                          


Operações CRUD:

Create (Criar)
- cadvendedor.php e cadproduto.php: Formulários que inserem dados no banco e salvam imagens.

Read (Ler)
- vendedorpage.php e produtopage.php: Listam os registros existentes com botões de ação.

Update (Atualizar)
- editarvendedor.php + atualizarvendedor.php: Permitem editar dados existentes.

Delete(Excluir)
- excluirvendedor.php: Exclui o vendedor selecionado pelo ID.


Tecnologias Utilizadas:

Linguagem: PHP
Banco de Dados: MySQL
Frontend: HTML + CSS + [Bootstrap 5.3.6](https://getbootstrap.com/)
Upload e gerenciamento de imagens


 Banco de Dados

O projeto utiliza duas tabelas principais:

Vendedor
Campo     | Tipo   

id        | INT (PK)     
nome      | VARCHAR(100) 
email     | VARCHAR(100) 

Produto
Campo       | Tipo         

id          | INT (PK)     
nome        | VARCHAR(100) 
tipo        | VARCHAR(50)  
preco       | DECIMAL      
imagem      | VARCHAR(255) 
id_vendedor | INT (FK)     

---

## ▶️ Como Executar o Projeto

1. Clone o repositório:
   bash
   git clone https://github.com/seu-usuario/seu-repositorio.git

