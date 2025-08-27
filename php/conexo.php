<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "weagles_connect";

// Conexão
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verificar conexão
if($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>
