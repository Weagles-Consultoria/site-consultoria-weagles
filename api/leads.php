<?php
declare(strict_types=1);
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');
header('X-Content-Type-Options: nosniff');
function proxyResponse(int $status,array $data): never { http_response_code($status); echo json_encode($data,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);exit; }
if (($_SERVER['REQUEST_METHOD']??'')!=='POST') proxyResponse(405,['ok'=>false]);
$url=trim((string)getenv('LANDING_CRM_URL'));$key=(string)getenv('LANDING_CRM_API_KEY');$parts=parse_url($url);
$local=getenv('LANDING_LOCAL_PREVIEW')==='true' && ($parts['scheme']??'')==='http' && in_array($parts['host']??'',['127.0.0.1','localhost','::1'],true);
if (!is_array($parts)||(($parts['scheme']??'')!=='https'&&!$local)||empty($parts['host'])||isset($parts['user'])||isset($parts['pass'])||$key===''||strpbrk($key,"\r\n")!==false) proxyResponse(503,['ok'=>false]);
if (!str_starts_with(strtolower((string)($_SERVER['CONTENT_TYPE']??'')),'application/json')) proxyResponse(415,['ok'=>false]);
if ((int)($_SERVER['CONTENT_LENGTH']??0)>16384) proxyResponse(413,['ok'=>false]);
$dir=sys_get_temp_dir().'/weagles-landing-ratelimit';
if (!is_dir($dir) && !@mkdir($dir,0700,true) && !is_dir($dir)) proxyResponse(503,['ok'=>false]);
$ip=(string)($_SERVER['REMOTE_ADDR']??'unknown');$file=@fopen($dir.'/'.hash('sha256',$ip),'c+');
if (!$file || !flock($file,LOCK_EX)) proxyResponse(503,['ok'=>false]);
$now=time();$current=json_decode((string)stream_get_contents($file),true);if(!is_array($current)||$now-(int)($current['start']??0)>=60)$current=['start'=>$now,'count'=>0];
$current['count']++;rewind($file);ftruncate($file,0);fwrite($file,json_encode($current));fflush($file);flock($file,LOCK_UN);fclose($file);
if($current['count']>120)proxyResponse(429,['ok'=>false]);
$raw=file_get_contents('php://input',false,null,0,16385);if($raw===false||strlen($raw)>16384)proxyResponse(413,['ok'=>false]);
try { $input=json_decode($raw,true,32,JSON_THROW_ON_ERROR);if(!is_array($input))throw new JsonException(); } catch(JsonException $e){proxyResponse(422,['ok'=>false]);}
$context=stream_context_create(['http'=>['method'=>'POST','header'=>"Content-Type: application/json\r\nX-API-Key: ".$key."\r\n",'content'=>$raw,'timeout'=>12,'ignore_errors'=>true,'follow_location'=>0,'max_redirects'=>0], 'ssl'=>['verify_peer'=>true,'verify_peer_name'=>true]]);
$response=@file_get_contents($url,false,$context,0,16385);$headers=$http_response_header??[];$status=0;
if(isset($headers[0])&&preg_match('/\s(\d{3})\s/',$headers[0],$m))$status=(int)$m[1];
$data=is_string($response)&&strlen($response)<=16384?json_decode($response,true):null;
if($status<200||$status>=300||!is_array($data)||($data['ok']??null)!==true||!is_string($data['lead_id']??null)||trim($data['lead_id'])==='')proxyResponse($status>=400&&$status<500?$status:502,['ok'=>false]);
proxyResponse($status===201?201:200,['ok'=>true,'lead_id'=>$data['lead_id']]);
