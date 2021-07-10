<?php
session_start();
 
require_once 'init.php';
require 'check.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>Painel</title>
    </head>
 
    <body>
         
        <h1>Painel do Administrador</h1>
 
        <p>Bem-vindo ao seu painel, <?php echo $_SESSION['name_user']; ?> | <a href="logout.php">Sair |</a><br>
        <a href="manu_clientes.php">|Manutenção de Clientes|</a><br>
        <a href="manu_animais.php">|Manutenção Animais|</a><br>
        <a href="manu_produtos.php">|Manutenção Produtos|</a><br>
        <a href="consultas.php">|Manutenção Consultas|</a><br>
    </body>