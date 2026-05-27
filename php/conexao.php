<?php
$host = getenv('DB_HOST') ?: 'localhost';
$port = getenv('DB_PORT') ?: '5432';
$dbname = getenv('DB_NAME') ?: 'weagles_connect';
$user = getenv('DB_USER') ?: 'postgres';
$password = getenv('DB_PASS') ?: 'postgres';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $conexao = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Falha na conexão: " . $e->getMessage());
}
?>
