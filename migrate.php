<?php
/**
 * Script de Migração Simples para Weagle Connect
 * Este script executa os arquivos .sql dentro de database/migrations/
 */

require_once 'php/conexao.php'; // Usa sua conexão PDO existente

$migrationsDir = __DIR__ . '/database/migrations/';
$files = scandir($migrationsDir);

// Filtra apenas arquivos .sql
$sqlFiles = array_filter($files, function($file) {
    return pathinfo($file, PATHINFO_EXTENSION) === 'sql';
});

sort($sqlFiles); // Garante a ordem de execução (001, 002...)

echo "--- Iniciando Migrações ---\n";

foreach ($sqlFiles as $file) {
    echo "Executando: $file... ";
    
    $sql = file_get_contents($migrationsDir . $file);
    
    try {
        $conexao->exec($sql);
        echo "[SUCESSO]\n";
    } catch (PDOException $e) {
        echo "[ERRO]: " . $e->getMessage() . "\n";
        // Se houver erro, paramos para não corromper a ordem
        exit(1);
    }
}

echo "--- Todas as migrações foram concluídas! ---\n";
?>