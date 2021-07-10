<?php
// constantes com as credenciais de acesso ao banco MySQL por PDO (login.php)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_NAME', 'Pet_Shop');
 
// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);

//desabilita os erros
//error_reporting(0);
//ini_set(“display_errors”, 0 );

// inclui o arquivo de funçõees
require_once 'functions.php'; 