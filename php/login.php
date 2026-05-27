<?php
session_start();
include("conexao.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$redirect_url = isset($_POST['redirect']) && !empty($_POST['redirect']) ? $_POST['redirect'] : '../pages/home.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $senha = trim($_POST["senha"]);

    $sql = "SELECT id_usuario, nome, senha FROM usuario WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    if (!$stmt) {
        
        header("Location: " . $redirect_url . "?login_error=erro_servidor");
        exit;
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        if (password_verify($senha, $usuario["senha"])) {
            // Credenciais corretas
            $_SESSION["usuario_id"] = $usuario["id_usuario"];
            $_SESSION["usuario_nome"] = $usuario["nome"];

            
            header("Location: " . $redirect_url);
            exit;
        } else {
            
            header("Location: " . $redirect_url . "?login_error=senha_incorreta");
            exit;
        }
    } else {
        
        header("Location: " . $redirect_url . "?login_error=email_nao_encontrado");
        exit;
    }

    $stmt->close();
}
?>