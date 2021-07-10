<?php
session_start();
 
require_once 'init.php';
require 'check.php';

?>
<html lang='pt-br'>
    <head>
    <meta charset="utf-8">
    <title>Manutenção Consultas</title>
    </head>
    <body>
    <h2>Informações das Consultas:</h2>
    <a href="consulta_presencial.php">|Marcar Consulta|</a>
        <?php

        $PDO = db_connect();
        $sql = "SELECT * FROM consultas";

        $stmt = $PDO->prepare($sql);

        $stmt->execute();

        ?>
<table border="2">
    <thead>
        <tr>
        <th>nome</th>
        <th>telefone</th>
        <th>rua</th>
        <th>numero</th>
        <th>pet</th>
        <th>sexo</th>
        <th>raça</th>
        <th>especie</th>
        <th>tipo_sanguineo</th>
        <th>tipo</th>
        <th>data</th>
        <th>estatus</th>
    </tr>
    </thead>
    <?php 
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tbody>
    <tr>

        <td><?php echo $row['nome'];?></td>
        <td><?php echo $row['telefone'];?></td>
        <td><?php echo $row['rua'];?></td>
        <td><?php echo $row['numero'];?></td>
        <td><?php echo $row['nome_pet'];?></td>
        <td><?php echo $row['sexo'];?></td>
        <td><?php echo $row['raça'];?></td>
        <td><?php echo $row['especie'];?></td>
        <td><?php echo $row['tipo_sanguineo'];?></td>
        <td><?php echo $row['tipo'];?></td>
        <td><?php echo $row['data'];?></td>
        <td><?php echo $row['estatus'];?></td>


    </tr>
    </tbody>
    <?php }; ?>
    
    </table>

