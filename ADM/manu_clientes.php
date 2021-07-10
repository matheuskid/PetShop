<!DOCTYPE html>
<?php
session_start();
 
require_once 'init.php';
require 'check.php';
?>
<html lang='pt-br'>
    <head>
    <meta charset="utf-8">
    <title>Manutenção Clientes</title>
    </head>
    <body>
    <h2>Informações dos Clientes:</h2>
        <?php

        $PDO = db_connect();
        $sql = "SELECT * FROM clientes";

        $stmt = $PDO->prepare($sql);

        $stmt->execute();
        ?>
<table border="2">
    <thead>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Senha</th>
            <th>Cartão</th>
            <th>Email</th>
            <th>Sexo</th>
            <th>Telefone</th>
            <th>Rua</th>
            <th>Numero</th>
            <th>Nascimento</th>
        </tr>
    <thead>
        <?php 
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
    <tbody>
    <tr>
        <td><?php echo $row['nome']; ?></td>
        <td><?php echo $row['cpf']; ?> </td>
        <td><?php echo $row['senha']; ?> </td>
        <td><?php echo $row['cartão']; ?> </td>
        <td><?php echo $row['email']; ?> </td>
        <td><?php echo $row['sexo']; ?> </td>
        <td><?php echo $row['telefone']; ?> </td>
        <td><?php echo $row['rua']; ?> </td>
        <td><?php echo $row['numero']; ?> </td>
        <td><?php echo $row['data_nasc']; ?> </td>
    </tr>
    </tbody>
        <?php } ?>
</body>
</html>