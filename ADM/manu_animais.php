<?php
session_start();
 
require_once 'init.php';
require 'check.php';
$PDO = db_connect();
if(isset($_POST['id_animail'])){
$id_animal = $_POST['id_animal'];

$sql = "DELETE FROM animais WHERE id_animal = '$id_animal'";

$stmt = $PDO->prepare($sql);

$stmt->execute();
}
?>
<body>
    <h1>Animais</h1>
    <a href="cad_animais.php">|Adicionar Animais|</a><br><br>
    <?php
$PDO = db_connect();
    
    $sql = "SELECT * FROM animais";

    $stmt = $PDO->prepare($sql);

    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
<table border="2">
    <thead>
        <tr>
            <th>Especie</th>
            <th>Raça</th>
            <th>Sexo</th>
            <th>Preço</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $row['especie'];?></td>
    <td><?php echo $row['raça'];?></td>
    <td><?php echo $row['sexo'];?></td>
    <td><?php echo $row['preço'];?></td>
    <td><form method="POST" action="manu_animais.php">
        <input type="hidden" name="id_animal" value="<?php echo $row['id_animal'];?>">
        <input type="submit" value="Retirar"></form></td>
    <?php } ?>
</body>
</html>