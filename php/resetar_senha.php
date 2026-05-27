<?php
require_once 'conexao.php';

header('Content-Type: application/json');

$response = ['success' => false, 'message' => 'Dados inválidos.'];

if (isset($_POST['email']) && isset($_POST['nova_senha'])) {
    $email = $_POST['email'];
    $novaSenha = $_POST['nova_senha'];

    if (strlen($novaSenha) < 6) { 
        $response['message'] = 'A senha deve ter no mínimo 6 caracteres.';
        echo json_encode($response);
        exit;
    }

    // Criptografa a nova senha
    $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

   
    $stmt = $conexao->prepare("UPDATE usuario SET senha = ? WHERE email = ?");
    
    if ($stmt->execute([$senhaHash, $email])) {
        $response['success'] = true;
        $response['message'] = 'Senha alterada com sucesso.';
    } else {
        $response['message'] = 'Erro ao atualizar a senha no banco de dados.';
    }
    $stmt = null;
}

$conexao = null;
echo json_encode($response);
?>