<?php
if (($_SERVER['HTTP_X_API_KEY']??'')!=='local-key'){http_response_code(403);echo '{"ok":false}';exit;}
$in=json_decode(file_get_contents('php://input'),true);
header('Content-Type: application/json');
if (($in['mode']??'')==='noid'){echo '{"ok":true}';exit;}
http_response_code(201);echo '{"ok":true,"lead_id":"42"}';
