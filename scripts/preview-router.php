<?php
declare(strict_types=1);
$path=parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH);
if($path==='/') { header('Content-Type: text/html; charset=utf-8');readfile(dirname(__DIR__).'/index.html');return true; }
if($path==='/api/leads') { require dirname(__DIR__).'/api/leads.php';return true; }
return false;
