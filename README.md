# Weagle Connect v0.8 - B2B High-Conversion Landing Page

Este projeto é uma plataforma de consultoria e tecnologia baseada em IA, transformada de um site multi-páginas para uma **Landing Page One-Page de alta conversão** focada em Direct Response e CRO (Conversion Rate Optimization).

## 🚀 Novas Funcionalidades (v0.8)

- **Arquitetura One-Page**: Navegação fluida via âncoras para retenção de usuários.
- **CRO Design**: Hero Section focada em "Dores do Cliente" e botões de conversão extrema.
- **Wizard Multi-Step**: Formulário de diagnóstico qualificado em 4 etapas (Segmento, Cargo, Faturamento e Contato).
- **Exit-Intent Popup**: Captura de leads que tentam sair da página sem converter.
- **IA Integration**: Chatbot "Weglinho" integrado via Flask (Python) para suporte em tempo real.

## 🛠️ Stack Tecnológica

- **Backend Principal**: PHP 8.2 (Vanilla/PDO) + PostgreSQL 15.
- **Backend IA**: Python (Flask) para o processamento de linguagem natural do chatbot.
- **Frontend**: HTML5, CSS3 (Modular/BEM) e Vanilla JavaScript.
- **Banco de Dados**: PostgreSQL com sistema de migrações versionadas.

## 🐳 Configuração Docker

O projeto está totalmente conteinerizado sob o nome **projetoweaglev08**.

### 1. Iniciar os Containers
No diretório raiz, execute:
```bash
docker-compose -p projetoweaglev08 up --build -d
```

### 2. Executar Migrações do Banco de Dados
Para criar as tabelas e aplicar as atualizações de CRO (como os novos campos de leads), execute o comando abaixo:

```bash
# Executa o script de migração dentro do container da aplicação
docker exec -it projetoweaglev08-app-1 php migrate.php
```

## 📂 Estrutura de Pastas

- `/pages`: Visualizações e componentes (Home, Modais).
- `/php`: Lógica de negócio, autenticação e conexão PDO.
- `/database/migrations`: Scripts SQL versionados.
- `/javascript`: Scripts de comportamento (Wizard, Exit-Intent, Chatbot).
- `/style`: Estilização modular CSS.
- `/vendor`: Dependências via Composer (PHPMailer, Dompdf).

## 🌐 Acesso
- **Aplicação**: [http://localhost:8090](http://localhost:8090)
- **API Chatbot**: [http://localhost:5000/chat](http://localhost:5000/chat)

## 🗄️ Dados de Conexão (DB)
- **Host**: `db`
- **Database**: `weagles_connect`
- **Usuário/Senha**: `postgres` / `postgres`
- **Porta Externa**: `5433` (para acesso via DBeaver/PGAdmin)

