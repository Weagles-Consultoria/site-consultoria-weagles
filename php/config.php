<?php

// Configurações de E-mail via Variáveis de Ambiente (Segurança de Produção)
define('SMTP_HOST', getenv('SMTP_HOST') ?: 'smtp.gmail.com');
define('SMTP_USERNAME', getenv('SMTP_USERNAME') ?: 'seu-email@gmail.com');
define('SMTP_PASSWORD', getenv('SMTP_PASSWORD') ?: 'sua-senha-app'); 
define('SMTP_PORT', getenv('SMTP_PORT') ?: 587);
define('SMTP_SECURE', getenv('SMTP_SECURE') ?: 'tls');

// E-mail de destino padrão caso não haja consultor atribuído
define('EMAIL_DESTINO', getenv('EMAIL_DESTINO') ?: SMTP_USERNAME);

?>