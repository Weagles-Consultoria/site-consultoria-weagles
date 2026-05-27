<?php
// Define a resposta padrão. 
$response = ['success' => false, 'message' => 'Ocorreu um erro desconhecido.'];

// Configura o cabeçalho para indicar que a resposta será em JSON
header('Content-Type: application/json');


require '../vendor/autoload.php';
// Arquivo de configuração com as senhas e dados sensíveis
require_once 'config.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;
use Dompdf\Options;


session_start();

if (!isset($_SESSION['usuario_id'])) {
    $response['message'] = 'Usuário não autenticado.';
    echo json_encode($response);
    exit;
}

require_once 'conexao.php';
$conn = $conexao;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id_consultor_atribuido = null;
    $email_consultor_atribuido = null; 

    
    $result_consultor = $conn->query("SELECT id_consultor, email FROM consultor ORDER BY RANDOM() LIMIT 1");
    $consultor = $result_consultor ? $result_consultor->fetch() : null;
    
    if ($consultor) {
        $id_consultor_atribuido = $consultor['id_consultor'];
        $email_consultor_atribuido = $consultor['email']; 
    } else {
        
        error_log("Nenhum consultor encontrado para atribuição. Usando e-mail de fallback.");
        if (defined('EMAIL_DESTINO')) {
            $email_consultor_atribuido = EMAIL_DESTINO;
        }
    }

    $dadosFormulario = [
        'razao'      => $_POST['razao'] ?? '',
        'cnpj'       => $_POST['cnpj'] ?? '',
        'email'      => $_POST['email'] ?? '',
        'telefone'   => $_POST['telefone'] ?? '',
        'area'       => $_POST['area'] ?? '',
        'dor'        => $_POST['dor'] ?? '',
        'descricao'  => $_POST['descricao'] ?? '',
        'id_usuario' => intval($_SESSION['usuario_id']),
        'id_consultor' => $id_consultor_atribuido
    ];

    $sql = "INSERT INTO cliente (nome_empresa, area_empresa, telefone, cnpj, dor_empresa, problema_empresa, email, id_usuario, id_consultor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        $response['message'] = "Erro na preparação.";
        echo json_encode($response);
        exit;
    }
    
    if ($stmt->execute([
        $dadosFormulario['razao'], $dadosFormulario['area'], $dadosFormulario['telefone'], $dadosFormulario['cnpj'], 
        $dadosFormulario['dor'], $dadosFormulario['descricao'], $dadosFormulario['email'], 
        $dadosFormulario['id_usuario'], $dadosFormulario['id_consultor']
    ])) {
        $response['success'] = true;
        $response['message'] = 'Dados enviados com sucesso!';
        
        
        if ($email_consultor_atribuido) {
            try {
                $htmlParaPdf = '
                <!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8"><title>Relatório</title><style>body{font-family:DejaVu Sans,sans-serif;font-size:12px}h1{text-align:center}table{width:100%;border-collapse:collapse}th,td{border:1px solid #ccc;padding:8px;text-align:left}th{background-color:#f2f2f2}</style></head><body>
                <h1>Nova Prospecção de Consultoria</h1><table><tr><th>Campo</th><th>Valor</th></tr>
                <tr><td>Razão Social</td><td>' . htmlspecialchars($dadosFormulario['razao']) . '</td></tr>
                <tr><td>CNPJ</td><td>' . htmlspecialchars($dadosFormulario['cnpj']) . '</td></tr>
                <tr><td>E-mail de Contato</td><td>' . htmlspecialchars($dadosFormulario['email']) . '</td></tr>
                <tr><td>Telefone</td><td>' . htmlspecialchars($dadosFormulario['telefone']) . '</td></tr>
                <tr><td>Área da Empresa</td><td>' . htmlspecialchars($dadosFormulario['area']) . '</td></tr>
                <tr><td>Dor da Empresa</td><td>' . htmlspecialchars($dadosFormulario['dor']) . '</td></tr>
                <tr><td>Descrição do Problema</td><td>' . nl2br(htmlspecialchars($dadosFormulario['descricao'])) . '</td></tr>
                </table></body></html>';

                $options = new Options();
                $options->set('defaultFont', 'DejaVu Sans');
                $dompdf = new Dompdf($options);
                $dompdf->loadHtml($htmlParaPdf);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();
                $outputPdf = $dompdf->output();

                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->Host       = SMTP_HOST;
                $mail->SMTPAuth   = true;
                $mail->Username   = SMTP_USERNAME;
                $mail->Password   = SMTP_PASSWORD;
                $mail->SMTPSecure = SMTP_SECURE;
                $mail->Port       = SMTP_PORT;
                $mail->CharSet    = 'UTF-8';

                $mail->setFrom(SMTP_USERNAME, 'Sistema Weagles');
                
                
                $mail->addAddress($email_consultor_atribuido, 'Consultor(a) Responsável');

                $mail->isHTML(true);
                $mail->Subject = 'Novo Cliente Cadastrado: ' . $dadosFormulario['razao'];
                $mail->Body    = 'Um novo cliente preencheu o formulário de consultoria. O relatório completo com os dados está em anexo.';
                $mail->addStringAttachment($outputPdf, 'Relatorio_' . date('Y-m-d') . '.pdf');

                $mail->send();

            } catch (Exception $e) {
                error_log("Erro no envio de e-mail: {$mail->ErrorInfo}");
            }
        } else {
            error_log("Não foi possível enviar o e-mail pois nenhum e-mail de consultor ou de fallback foi definido.");
        }
        
    } else {
        $response['message'] = "Erro ao salvar os dados.";
    }
    $stmt = null;
}

$conn = null;


echo json_encode($response);
exit;
?>