<?php
declare(strict_types=1);
$root=dirname(__DIR__);$crmPort=19041;$sitePort=19042;
$fake=proc_open([PHP_BINARY,'-S','127.0.0.1:'.$crmPort,'-t',$root.'/tests/fixtures'],[['pipe','r'],['file','/dev/null','a'],['file','/dev/null','a']],$pipes,$root);
$env=array_merge($_ENV,['LANDING_CRM_URL'=>'http://127.0.0.1:'.$crmPort.'/fake_crm.php','LANDING_CRM_API_KEY'=>'local-key','LANDING_LOCAL_PREVIEW'=>'true']);
$site=proc_open([PHP_BINARY,'-S','127.0.0.1:'.$sitePort,'-t',$root],[['pipe','r'],['file','/dev/null','a'],['file','/dev/null','a']],$pipes2,$root,$env);
try {
 foreach([$crmPort,$sitePort] as $port){for($i=0;$i<50;$i++){if($s=@fsockopen('127.0.0.1',$port,$e,$m,0.1)){fclose($s);break;}usleep(20000);}}
 function proxyCall(string $method,string $body='{}',string $contentType='application/json'): array {global $sitePort; $opts=['http'=>['method'=>$method,'header'=>"Content-Type: $contentType\r\n",'content'=>$body,'ignore_errors'=>true,'timeout'=>5]];$raw=file_get_contents("http://127.0.0.1:$sitePort/api/leads.php",false,stream_context_create($opts));preg_match('/\s(\d{3})\s/',$http_response_header[0]??'',$m);return [(int)($m[1]??0),json_decode((string)$raw,true)];}
 [$status,$body]=proxyCall('POST','{"mode":"ok"}');if($status!==201||($body['lead_id']??null)!=='42')throw new RuntimeException('Confirmação falhou: '.$status);
 [$status,$body]=proxyCall('POST','{"mode":"noid"}');if($status!==502||($body['ok']??true)!==false)throw new RuntimeException('Aceitou confirmação sem ID');
 [$status]=proxyCall('POST','{}','text/plain');if($status!==415)throw new RuntimeException('Aceitou tipo inválido');
 [$status]=proxyCall('POST',str_repeat('x',17000));if($status!==413)throw new RuntimeException('Aceitou corpo grande');
 [$status]=proxyCall('GET');if($status!==405)throw new RuntimeException('Aceitou GET');
 echo "SiteLandingProxyHttpTest: OK\n";
}finally{proc_terminate($site);proc_close($site);proc_terminate($fake);proc_close($fake);}
