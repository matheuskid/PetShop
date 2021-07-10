<?php
//constantes para pagina: manutenção_dados.php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'Pet_Shop';
// constantes com as credenciais de acesso ao banco MySQL por PDO (login.php)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_NAME', 'Pet_Shop');
 
// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);
 
// inclui o arquivo de funçõees
require_once 'functions.php'; 