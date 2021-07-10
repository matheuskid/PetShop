<?php
session_start();
 
require_once 'init.php';
require 'check.php';

if(isset($_POST['estatus'])){

$PDO = db_connect();
$estatus  = $_POST['estatus'];
$id = $_POST['id'];
$sql = "UPDATE consultas SET estatus = '$estatus' WHERE id_consulta = '$id'";
$stmt = $PDO->prepare($sql);

$stmt->execute();
}
?>
<html lang='pt-br'>
    <head>
    <meta charset="utf-8">
    <title>Manutenção Consultas</title>
    </head>
    <body>
    <h2>Informações das Consultas:</h2>
        <?php

        $PDO = db_connect();
        $sql = "SELECT * FROM consultas";

        $stmt = $PDO->prepare($sql);

        $stmt->execute();

        ?>
<table border="2">
    <thead>
        <tr>
        <th>id_consulta</th>
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
        <td><?php echo $row['id_consulta'];?></td>
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
        <?php if($row['estatus']=="pendente"){?>
        <td><form action="Untitled-1.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id_consulta'];?>">
        <select name="estatus">
        <option  value="realizada">Realizada</option>
        <option value="cancelada">Cancelada</option>
    </select></td>
    <td><input type="submit" value="atualizar"></form></td>
    <td>
    <?php }; ?>
    </tr>
    </tbody>
    <?php }; ?>
    
    </table>

