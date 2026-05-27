<?php
session_start();
include('conexao.php');


$redirect_url = isset($_POST['redirect']) && !empty($_POST['redirect']) ? $_POST['redirect'] : '../pages/home.php';


function validatePasswordStrength($password) {
    
    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/';
    return preg_match($pattern, $password);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["nome-usuario"]) && !empty(trim($_POST["nome-usuario"])) &&
        isset($_POST["email-usuario"]) && !empty(trim($_POST["email-usuario"])) &&
        isset($_POST["usuario-senha"]) && !empty($_POST["usuario-senha"]) &&
        isset($_POST["confirmar-senha"]) && !empty($_POST["confirmar-senha"])
    ) {
        $nome_recebido = trim($_POST["nome-usuario"]);
        $email_recebido = trim($_POST["email-usuario"]);
        $senha_recebido = $_POST["usuario-senha"];
        $confirmar_senha_recebido = $_POST["confirmar-senha"];

        
        if ($senha_recebido !== $confirmar_senha_recebido) {
            header("Location: " . $redirect_url . "?cadastro=erro_senhas");
            exit;
        }

        
        if (!validatePasswordStrength($senha_recebido)) {
            header("Location: " . $redirect_url . "?cadastro=erro_senha_fraca");
            exit;
        }

        if (!filter_var($email_recebido, FILTER_VALIDATE_EMAIL)) {
            header("Location: " . $redirect_url . "?cadastro=erro_email_invalido");
            exit;
        }

        
        $sql_verificar = "SELECT 1 FROM usuario WHERE email = ?";
        $stmt_verificar = $conexao->prepare($sql_verificar);
        if (!$stmt_verificar) {
            header("Location: " . $redirect_url . "?cadastro=erro_servidor");
            exit;
        }
        $stmt_verificar->execute([$email_recebido]);

        if ($stmt_verificar->fetch()) {
            $stmt_verificar = null;
            header("Location: " . $redirect_url . "?cadastro=erro_email");
            exit;
        }
        $stmt_verificar = null;

        
        $senha_hash = password_hash($senha_recebido, PASSWORD_DEFAULT);

       
        $sql_insert = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
        $stmt_insert = $conexao->prepare($sql_insert);
        if (!$stmt_insert) {
            header("Location: " . $redirect_url . "?cadastro=erro_servidor");
            exit;
        }

        if ($stmt_insert->execute([$nome_recebido, $email_recebido, $senha_hash])) {
            $novo_usuario_id = $conexao->lastInsertId();
            $_SESSION["usuario_id"] = $novo_usuario_id;
            $_SESSION["usuario_nome"] = $nome_recebido;
            $stmt_insert = null;
            header("Location: " . $redirect_url . "?cadastro=sucesso");
            exit;
        } else {
            $stmt_insert = null;
            header("Location: " . $redirect_url . "?cadastro=erro_dados");
            exit;
        }
    } else {
        header("Location: " . $redirect_url . "?cadastro=erro_campos");
        exit;
    }
}
?>
