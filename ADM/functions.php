<?php
 
/**
 * Conecta com o MySQL usando PDO
 */
function db_connect()
{
    $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER);

    return $PDO;
}
 
 
 
 
/**
 * Verifica se o usuário está logado
 */
function isLoggedIn()
{
    if ($_SESSION['logged_in'] == "adm")
    {
        return true;
    }
 
    return false;
}