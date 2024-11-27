# SisCoc
Sistema de Controle Clinico

# Sistema de Controle Clínico (SisCoc)

Bem-vindo ao **SisCoc**! Este é um sistema desenvolvido em **PHP** com **Bootstrap** e integração com banco de dados, com o objetivo de gerenciar informações relacionadas a médicos, pacientes, consultas e exames em uma clínica.

---

## 💻 **Funcionalidades**

- **Cadastro de médicos**: Adicione informações de profissionais de saúde.
- **Cadastro de pacientes**: Registre os dados de pacientes para fácil acesso e consulta.
- **Gerenciamento de consultas**:
  - Visualização de consultas por paciente e médico.
  - Edição e exclusão de consultas.
  - Listagem agrupada de consultas com detalhes expandidos via **Accordion**.
- **Gerenciamento de exames**:
  - Cadastro e listagem de exames associados a pacientes.
- **Navegação dinâmica**: Páginas carregadas dinamicamente via parâmetros `GET`.

---

## 🛠️ **Tecnologias Utilizadas**

- **Frontend**: 
  - **Bootstrap** para estilização responsiva.
  - Design focado em simplicidade e acessibilidade, incluindo gradiente para o plano de fundo.
- **Backend**:
  - **PHP** com orientação a objetos para manipulação de dados.
  - Conexão ao banco de dados usando `MySQL`.
- **Banco de Dados**:
  - Estrutura relacional com tabelas para médicos, pacientes, consultas e exames.

---

## 📑 **Estrutura do Projeto**

### **Arquivos principais**
- `index.php`: Controlador principal que gerencia o carregamento das páginas com base nos parâmetros da URL.
- `config.php`: Arquivo de configuração para conexão ao banco de dados.
- Páginas específicas:
  - `cadastrar-*.php`: Páginas de cadastro.
  - `listar-*.php`: Páginas de listagem.
  - `editar-*.php`: Páginas de edição.
  - `salvar-*.php`: Processamento das ações de salvar, editar ou excluir.
    
---

## 🚀 **Configuração**

### **Pré-requisitos**
- Servidor local com suporte a PHP (ex.: XAMPP, WAMP ou Laragon).
- Banco de dados MySQL configurado.

### **Passos para Instalação**
1. Clone o repositório ou copie os arquivos do projeto para o servidor.
2. Configure o arquivo `config.php` com suas credenciais de banco de dados:
   ```php
   $conn = new mysqli('localhost', 'usuario', 'senha', 'nome_do_banco');
   ```
3. Importe o arquivo SQL do banco de dados.
4. Acesse o sistema no navegador: `http://localhost/siscoc`.

---


## ✍️ **Autor**

Desenvolvido por **Pedro Henrique**, como parte de um projeto acadêmico de Ciência da Computação.

---

Se tiver dúvidas ou sugestões, sinta-se à vontade para contribuir ou entrar em contato!
