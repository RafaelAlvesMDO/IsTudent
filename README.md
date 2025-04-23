# Laravel + PostgreSQL com Docker

Este guia tem como objetivo documentar o passo a passo completo de como configurar um projeto Laravel para usar o banco de dados PostgreSQL em um container Docker, além de explicar os conceitos envolvidos.

---

## Requisitos

- Docker instalado e rodando
- Laravel já instalado
- PHP com extensões para PostgreSQL habilitadas (`pdo_pgsql`)
- Editor de código (como o VS Code)

---

## 1. Subindo o container PostgreSQL com Docker

```bash
docker run --name postgres-container \
  -e POSTGRES_USER=postgres \
  -e POSTGRES_PASSWORD=postgres \
  -e POSTGRES_DB=postgres \
  -p 5432:5432 \
  -v postgres_data:/var/lib/postgresql/data \
  -d postgres
```

**O que este comando faz:**
- Cria um container chamado `postgres-container`
- Define usuário, senha e nome inicial do banco
- Expõe a porta 5432 (PostgreSQL)
- Cria um volume para persistência dos dados

---

## 2. Criando o banco de dados real

Acesse o terminal do container:
```bash
docker exec -it postgres-container psql -U postgres
```

E crie o banco:
```sql
CREATE DATABASE istudent_db;
```

---

## 3. Configurando o Laravel para se conectar ao PostgreSQL

Abra o arquivo `.env` que está na raiz do seu projeto Laravel e edite as seguintes linhas:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=istudent_db
DB_USERNAME=postgres
DB_PASSWORD=postgres
```

**O que isso faz:** Laravel passa a usar PostgreSQL em vez de MySQL, e se conecta ao banco criado.

---

## 4. Habilitando o driver PostgreSQL no PHP

No arquivo `php.ini`, ative as extensões:
```ini
extension=pdo_pgsql
extension=pgsql
```

**Depois disso, reinicie o Apache ou o ambiente PHP.**

Se você está rodando o projeto com `php artisan serve`, pode simplesmente fechar e abrir novamente o terminal.

---

## 5. Rodando as migrations iniciais

```bash
php artisan migrate
```

**O que isso faz:**
- Cria as tabelas padrão do Laravel no banco (`users`, `password_resets`, etc.)

---

## 6. Criando um Model com Migration

```bash
php artisan make:model Aluno -m
```

**Isso gera:**
- Um model `app/Models/Aluno.php`
- Um arquivo de migration em `database/migrations/`

Abra o arquivo da migration e defina os campos da tabela:
```php
Schema::create('alunos', function (Blueprint $table) {
    $table->id();
    $table->string('nome');
    $table->string('email')->unique();
    $table->timestamps();
});
```

Rode novamente:
```bash
php artisan migrate
```

**Agora a tabela `alunos` existirá no banco.**

---

## Conceitos Importantes

### O que é um Model?
Um *Model* em Laravel é uma representação de uma tabela no banco de dados. Ele define como interagir com os dados daquela tabela (como buscar, inserir, atualizar).

### O que é uma Migration?
Uma *Migration* é um arquivo PHP que define como uma tabela deve ser criada ou modificada no banco. Ela funciona como uma "versão" do seu banco.

### O que significa conectar ao banco?
Significa informar ao Laravel onde está o banco, qual é o nome dele, o usuário, senha e tipo (MySQL, PostgreSQL etc). Com isso, o Laravel consegue enviar comandos e consultas para o banco.

---

## Finalizando

Após seguir esse guia, seu Laravel estará pronto para usar PostgreSQL com Eloquent ORM, criando tabelas, models e acessando dados de forma simples.

Se quiser criar rotas e controllers para manipular os dados do model, esse seria o próximo passo!

