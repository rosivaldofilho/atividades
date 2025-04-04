# Sistema de Gerenciamento de Atividades

![Laravel Version](https://img.shields.io/badge/Laravel-10.x-red) ![PHP Version](https://img.shields.io/badge/PHP-8.3.7-blue)

Sistema desenvolvido em Laravel para gerenciar departamentos, usuários, categorias e atividades. O projeto permite criar, listar, editar e excluir registros, além de estabelecer relacionamentos entre os modelos.

---

## Funcionalidades

- **Departamentos**:
  - Cadastro, listagem, edição e exclusão de departamentos.
- **Usuários**:
  - Cadastro, listagem, edição e exclusão de usuários.
  - Relacionamento com departamentos.
- **Categorias**:
  - Cadastro, listagem, edição e exclusão de categorias.
- **Atividades**:
  - Cadastro, listagem, edição e exclusão de atividades.
  - Relacionamento com categorias, usuários e departamentos.
  - Filtros por descrição, status e data.

---

## Requisitos

Antes de começar, certifique-se de que você possui os seguintes requisitos instalados:

- **PHP**: Versão **8.3.7** ou superior.
- **Composer**: Gerenciador de dependências do PHP.
- **SQLite**: Banco de dados leve e embutido.
- **Git**: Para controle de versão e clonagem do repositório.

---

### 2. Instale as Dependências

Instale as dependências do Composer:

```bash
composer install

npm install
npm run build


### 3. Configure o Arquivo `.env`

Copie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente:

```bash
cp .env.example .env


Edite o arquivo .env para configurar o banco de dados SQLite:
```bash
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

Crie o arquivo de banco de dados SQLite:
```bash
touch database/database.sqlite

Gere a chave de aplicação:
```bash
php artisan key:generate






