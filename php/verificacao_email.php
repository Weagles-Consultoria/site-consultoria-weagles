<?php
require_once 'conexao.php'; 

header('Content-Type: application/json');

$response = ['exists' => false];

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    
    $stmt = $conexao->prepare("SELECT id_usuario FROM usuario WHERE email = ?");
    
    $stmt->execute([$email]);
    
    if ($stmt->fetch()) {
        $response['exists'] = true;
    }


    $stmt = null;
}
$conexao = null;

echo json_encode($response);
?>