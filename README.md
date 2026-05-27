# Projeto Weagle - Configuração Docker (PostgreSQL)

Este projeto foi migrado de MySQL para PostgreSQL e está configurado para rodar em containers Docker.

## Pré-requisitos

- [Docker](https://www.docker.com/) instalado.
- [Docker Compose](https://docs.docker.com/compose/) instalado.

## Estrutura do Docker

- **app**: Container PHP 8.2 com Apache, configurado com as extensões `pdo` e `pdo_pgsql`.
- **db**: Container PostgreSQL 15.

## Como Rodar o Projeto

1. **Construir e iniciar os containers:**

   No diretório raiz do projeto, execute:
   ```bash
   docker-compose up --build -d
   ```

2. **Criação das Tabelas (Migrations):**

   O arquivo `init.sql` foi configurado para criar automaticamente as tabelas `usuario`, `consultor` e `cliente` assim que o container do banco de dados for iniciado pela primeira vez. 

   Se você precisar rodar o script manualmente ou resetar o banco:
   ```bash
   docker exec -i $(docker ps -qf "name=db") psql -U postgres -d weagles_connect < init.sql
   ```

3. **Acessar a Aplicação:**

   A aplicação estará disponível em: [http://localhost:8080](http://localhost:8080)

## Configurações de Banco de Dados

As variáveis de ambiente estão configuradas no `docker-compose.yml`:

- **Host**: `db`
- **Porta**: `5432`
- **Database**: `weagles_connect`
- **Usuário**: `postgres`
- **Senha**: `postgres`

A porta exposta para acesso externo ao banco (via DBeaver, etc) é a **5433**.

## Migração Técnica

- A camada de conexão PHP foi alterada de `mysqli` para `PDO`.
- Consultas SQL foram adaptadas (ex: `RAND()` para `RANDOM()`).
- O schema do banco utiliza `SERIAL` para IDs autoincrementais.
