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
         
        <h1>Painel do Veterinário</h1>
 
        <p>Bem-vindo ao seu painel, <?php echo $_SESSION['name_user']; ?> | <a href="logout.php">Sair |</a><br>
        <a href="manu_consultas.php">|Tabela de Consultas|</a><br>

        <h2>Atendimento Rápido:</h2>
<?php 
        $PDO = db_connect();

        $sql = "SELECT * FROM ar";

        $stmt = $PDO->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $id_dono = $row['id_dono'];

        $sql2 = "SELECT nome, telefone, rua, numero FROM clientes WHERE id_user = '$id_dono'";

        $stmt2 = $PDO->prepare($sql2);
        $stmt2->execute();
        $dono = $stmt2->fetch(PDO::FETCH_ASSOC);

        $id_pet = $row['id_pet'];

        $sql3 = "SELECT nome, especie FROM pet WHERE id_pet = '$id_pet'";

        $stmt3 = $PDO->prepare($sql3);
        $stmt3->execute();
        $pet = $stmt3->fetch(PDO::FETCH_ASSOC);

        ?>
<div style="margin-top:16px; margin-bottom: 10px;">
        Dono: <?php echo $dono['nome'];?><br>
        telefone: <?php echo $dono['telefone'];?><br>
        Rua: <?php echo $dono['rua'];?> nº: <?php echo $dono['numero'];?><br>

        Pet: <?php echo $pet['nome']."(".$pet['especie'].")";?><br>

        Ocorrido: <?php echo $row['ocorrido'];?><br>
        Detalhes: <?php echo $row['detalhes'];?><br><p></p>
        Hora: <?php echo $row['hora'];?> Estatus: <?php echo $row['estatus'];
        if($row['estatus']=="atendido"){
        }else{?>
        <form action="atender.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id_ocorrencia'];?>">
        <input type="submit" value="antender">
        </form>
        <?php } ?>
</div>
    
        <?php } ?>

    </body>