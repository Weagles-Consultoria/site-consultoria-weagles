<?php
$response = ['success' => false, 'message' => 'Ocorreu um erro desconhecido.'];

header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    $response['message'] = 'Método não permitido.';
    echo json_encode($response);
    exit;
}

$webhookUrl = 'https://webhook.weagles.com.br/webhook/963bec1a-38dc-454c-9dbc-b965ad0b792a';

$payload = [
    'nome' => trim($_POST['nome'] ?? ''),
    'email' => trim($_POST['email'] ?? ''),
    'telefone' => trim($_POST['telefone'] ?? ''),
    'segmento' => trim($_POST['segmento'] ?? ($_POST['area'] ?? '')),
    'cargo' => trim($_POST['cargo'] ?? 'Não informado'),
    'time_comercial' => trim($_POST['faturamento'] ?? 'Não informado'),
    'mensagem' => trim($_POST['mensagem'] ?? ($_POST['descricao'] ?? 'Lead via landing page Weagles')),
    'empresa' => trim($_POST['razao'] ?? ''),
    'cnpj' => trim($_POST['cnpj'] ?? ''),
    'dor' => trim($_POST['dor'] ?? ''),
    'origem' => 'landing-page-weagles',
    'enviado_em' => date('c')
];

if (
    $payload['email'] === '' ||
    $payload['telefone'] === '' ||
    $payload['segmento'] === '' ||
    ($payload['nome'] === '' && $payload['empresa'] === '')
) {
    http_response_code(422);
    $response['message'] = 'Preencha todos os campos obrigatórios.';
    echo json_encode($response);
    exit;
}

if ($payload['nome'] === '' && $payload['empresa'] !== '') {
    $payload['nome'] = 'Contato via formulário de consultoria';
}

$jsonPayload = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

if ($jsonPayload === false) {
    http_response_code(500);
    $response['message'] = 'Erro ao preparar os dados do webhook.';
    echo json_encode($response);
    exit;
}

$ch = curl_init($webhookUrl);
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $jsonPayload,
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonPayload),
    ],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 15,
]);

$webhookResponse = curl_exec($ch);
$curlError = curl_error($ch);
$httpStatus = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($webhookResponse === false || $curlError !== '') {
    http_response_code(502);
    $response['message'] = 'Não foi possível enviar os dados ao webhook.';
    error_log('Erro webhook Weagles: ' . $curlError);
    echo json_encode($response);
    exit;
}

if ($httpStatus < 200 || $httpStatus >= 300) {
    http_response_code(502);
    $response['message'] = 'Webhook retornou erro ao receber os dados.';
    error_log('Webhook Weagles respondeu com status ' . $httpStatus . ' e corpo: ' . $webhookResponse);
    echo json_encode($response);
    exit;
}

$response['success'] = true;
$response['message'] = 'Dados enviados com sucesso.';

echo json_encode($response);
exit;
?>
