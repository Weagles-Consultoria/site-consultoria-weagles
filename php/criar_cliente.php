<?php
$response = ['success' => false, 'message' => 'Ocorreu um erro desconhecido.'];

header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    $response['message'] = 'Metodo nao permitido.';
    echo json_encode($response);
    exit;
}

$webhookUrl = 'https://crm-weagles.weagles.com.br/api/adiciona_lead_formulario.php';

$nomeRaw = trim($_POST['nome'] ?? '');
$empresaRaw = trim($_POST['razao'] ?? '');
if ($nomeRaw === '' && $empresaRaw !== '') {
    $nomeRaw = 'Contato via formulário de consultoria';
}

$dadosFormulario = [
    'nome' => $nomeRaw,
    'email' => trim($_POST['email'] ?? ''),
    'telefone' => trim($_POST['telefone'] ?? ''),
    'segmento' => trim($_POST['segmento'] ?? ($_POST['area'] ?? '')),
    'cargo' => trim($_POST['cargo'] ?? 'Não informado'),
    'faturamento' => trim($_POST['faturamento'] ?? 'Não informado'),
    'time_comercial' => trim($_POST['time_comercial'] ?? ($_POST['faturamento'] ?? 'Não informado')),
    'mensagem' => trim($_POST['mensagem'] ?? ($_POST['descricao'] ?? 'Lead via landing page Weagles')),
    'empresa' => $empresaRaw,
    'cnpj' => trim($_POST['cnpj'] ?? ''),
    'dor' => trim($_POST['dor'] ?? '')
];

if (
    $dadosFormulario['email'] === '' ||
    $dadosFormulario['telefone'] === '' ||
    $dadosFormulario['segmento'] === '' ||
    $dadosFormulario['nome'] === ''
) {
    http_response_code(422);
    $response['message'] = 'Preencha todos os campos obrigatórios.';
    echo json_encode($response);
    exit;
}

// Monta a string rica para a descrição do CRM
$descricaoTexto = "*👤 Nome:* " . $dadosFormulario['nome'] . "\n"
                . "*📱 WhatsApp:* " . $dadosFormulario['telefone'] . "\n"
                . "*✉️ E-mail:* " . $dadosFormulario['email'] . "\n";

if ($dadosFormulario['empresa'] !== '') {
    $descricaoTexto .= "*🏢 Empresa:* " . $dadosFormulario['empresa'] . "\n";
}
if ($dadosFormulario['cnpj'] !== '') {
    $descricaoTexto .= "*📄 CNPJ:* " . $dadosFormulario['cnpj'] . "\n";
}

$descricaoTexto .= "\n*🎯 Segmento:* " . $dadosFormulario['segmento'] . "\n"
                 . "*💼 Cargo:* " . $dadosFormulario['cargo'] . "\n"
                 . "*💵 Faturamento:* " . $dadosFormulario['faturamento'] . "\n"
                 . "*👥 Time Comercial:* " . $dadosFormulario['time_comercial'] . "\n\n";

if ($dadosFormulario['dor'] !== '') {
    $descricaoTexto .= "*🚀 Maior Desafio:* " . $dadosFormulario['dor'] . "\n";
}

$descricaoTexto .= "*📝 Mensagem:* " . $dadosFormulario['mensagem'];

$mensagemGrupo = "## 📝 NOVO LEAD RECEBIDO\n---\n" . $descricaoTexto;

$payload = [
    'nome' => $dadosFormulario['nome'],
    'telefone' => preg_replace('/\D/', '', $dadosFormulario['telefone']), // Apenas números
    'origem' => 'Landing Page',
    'descricao' => $descricaoTexto,
    'coluna_id' => 73,
    'avisar_grupo' => true,
    'mensagem_grupo' => $mensagemGrupo,
    'enviar_mensagem_lead' => true,
    'mensagem_lead' => [
        "Oi! Aqui é a equipe Weagles, do Vitor Garbin e do João Cozentino. 😊 Vi que você preencheu nosso formulário agora há pouco!",
        "Que horário fica melhor pra uma ligação rápida de 5 minutos? De manhã ou à tarde?"
    ],
    'instancia_id' => 55,
    'novo_lead' => 1
];

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
    $response['message'] = 'Nao foi possivel enviar os dados ao webhook.';
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
