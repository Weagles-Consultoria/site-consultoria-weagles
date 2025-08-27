<?php
require_once 'conexo.php'; 

header('Content-Type: application/json');

$response = ['exists' => false];

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    
    $stmt = $conexao->prepare("SELECT id_usuario FROM usuario WHERE email = ?");
    
    
    $stmt->bind_param("s", $email); 
    
    
    $stmt->execute();
    

    $result = $stmt->get_result();

    if ($result->fetch_assoc()) {
        $response['exists'] = true;
    }


    $stmt->close();
}
$conexao->close();

echo json_encode($response);
?>