#!/bin/bash

# Script para configurar/resetar o banco de dados na VPS
# Certifique-se de que o container 'db' está rodando antes de executar.

# Carrega as variáveis do .env se existir
if [ -f .env ]; then
    export $(cat .env | xargs)
fi

DB_CONTAINER_NAME=$(docker ps -qf "name=db")

if [ -z "$DB_CONTAINER_NAME" ]; then
    echo "Erro: O container do banco de dados (db) não está rodando."
    exit 1
fi

echo "Iniciando a criação das tabelas no PostgreSQL..."

# Executa o init.sql dentro do container
docker exec -i $DB_CONTAINER_NAME psql -U ${DB_USER:-postgres} -d ${DB_NAME:-weagles_connect} < init.sql

if [ $? -eq 0 ]; then
    echo "------------------------------------------"
    echo "Sucesso! Tabelas criadas/verificadas."
    echo "------------------------------------------"
else
    echo "------------------------------------------"
    echo "Erro ao executar o script SQL."
    echo "------------------------------------------"
fi
