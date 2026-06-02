-- Baseline: Esquema Inicial do Projeto Weagle Connect
-- Versão: 1.0.0

-- Tabela de Usuários (Login administrativo/cliente)
CREATE TABLE IF NOT EXISTS usuario (
    id_usuario SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de Consultores (Equipe Weagle)
CREATE TABLE IF NOT EXISTS consultor (
    id_consultor SERIAL PRIMARY KEY,
    nome VARCHAR(255),
    email VARCHAR(255) UNIQUE NOT NULL
);

-- Tabela de Clientes/Leads
CREATE TABLE IF NOT EXISTS cliente (
    id_cliente SERIAL PRIMARY KEY,
    nome_empresa VARCHAR(255), -- Removido NOT NULL para compatibilidade com novos Leads
    area_empresa VARCHAR(255),
    telefone VARCHAR(50),
    cnpj VARCHAR(20),
    dor_empresa VARCHAR(255),
    problema_empresa TEXT,
    email VARCHAR(255),
    id_usuario INT REFERENCES usuario(id_usuario) ON DELETE CASCADE,
    id_consultor INT REFERENCES consultor(id_consultor) ON DELETE SET NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Dados iniciais (Seed)
INSERT INTO consultor (nome, email) 
SELECT 'Consultor Alpha', 'alpha@weagles.com'
WHERE NOT EXISTS (SELECT 1 FROM consultor WHERE email = 'alpha@weagles.com');

INSERT INTO consultor (nome, email) 
SELECT 'Consultor Beta', 'beta@weagles.com'
WHERE NOT EXISTS (SELECT 1 FROM consultor WHERE email = 'beta@weagles.com');
