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
         
        <h1>Painel do Usuário</h1>
 
        <p>Bem-vindo ao seu painel, <?php echo $_SESSION['name_user']; ?> | <a href="http://localhost/PetShop/indexu.php">Index |</a>
        <a href="http://localhost/PetShop/cadastro_pet.php">Add Pet |</a>
        <a href="http://localhost/PetShop/aten_rapido.php">Antendimento Rapido || </a>
        <a href="http://localhost/PetShop/logout.php">Sair</a> 
        </p>
        <h2>Informações dos Pets:</h2>
        <?php

        $PDO = db_connect();
        $id_dono = $_SESSION['id_user'];
        $sql = "SELECT * FROM pet WHERE id_dono = '$id_dono'";

        $stmt = $PDO->prepare($sql);

        $stmt->execute();
        ?>
<table border="2">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Especie</th>
            <th>Raça</th>
            <th>Nascimento</th>
            <th>Sexo</th>
            <th>Tipo Sanguíneo</th>
        </tr>
    <thead>
        <?php 
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
    <tbody>
    <tr><form method="POST" action="crud_pet.php">
        <td><input type="text" name="nome" value="<?php echo isset($row['nome'])?$row['nome']:""; ?>"></td>
        <td><input type="text" name="especie" value="<?php echo isset($row['especie'])?$row['especie']:""; ?>" ></td>
        <td><input type="text" name="nasc" value="<?php echo isset($row['raça'])?$row['raça']:""; ?>" ></td>
        <td><input type="text" name="raça" value="<?php echo isset($row['data_nasc'])?$row['data_nasc']:""; ?>" ></td>
        <td><input type="text" name="sexo" value="<?php echo isset($row['sexo'])?$row['sexo']:""; ?>" ></td>
        <td><input type="text" name="sang" value="<?php echo isset($row['tipo_sang'])?$row['tipo_sang']:""; ?>" ></td>
        <td>
        <input type="hidden" name="id_pet" value="<?php echo $row['id_pet'];?>">
        <input type="submit" value="altera" name="altera">
        <input type="submit" value="apagar" name="apagar"></form></td>
    </tr>
    </tbody>
        <?php } ?>
</body>
</html>