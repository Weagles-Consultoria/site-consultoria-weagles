-- Migration: Adição de campos para o Wizard de Consultoria B2B
-- Objetivo: Suportar os dados de qualificação de Leads (Segmento, Cargo, Faturamento)
-- Data: 2026-06-02

-- 1. Adicionar campos de qualificação
ALTER TABLE cliente ADD COLUMN IF NOT EXISTS segmento VARCHAR(100);
ALTER TABLE cliente ADD COLUMN IF NOT EXISTS cargo VARCHAR(100);
ALTER TABLE cliente ADD COLUMN IF NOT EXISTS faturamento VARCHAR(100);
ALTER TABLE cliente ADD COLUMN IF NOT EXISTS nome_contato VARCHAR(255);

-- 2. Tornar 'nome_empresa' opcional caso o lead ainda não tenha informado
ALTER TABLE cliente ALTER COLUMN nome_empresa DROP NOT NULL;

-- 3. (Opcional) Comentários para documentação no DB
COMMENT ON COLUMN cliente.segmento IS 'Segmento de atuação da empresa do lead';
COMMENT ON COLUMN cliente.cargo IS 'Cargo do contato que preencheu o formulário';
COMMENT ON COLUMN cliente.faturamento IS 'Faixa de faturamento mensal informada no wizard';
COMMENT ON COLUMN cliente.nome_contato IS 'Nome completo da pessoa de contato';
