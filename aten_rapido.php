<!DOCTYPE html>
<?php
session_start();

require 'init.php';
require 'check.php';
$id_user = $_SESSION['id_user'];
    $PDO = db_connect();
    $sql = "SELECT id_pet, nome FROM pet WHERE id_dono = '$id_user'";

    $stmt = $PDO->prepare($sql);
            
    $stmt->execute();
    ?>

<head>
<html lang = "Pt-Br">
<meta charset = "utf-8">
<title>Pet Shop!</title>

</head>
<body>
<h1>Pet Shop</h1>
<h1>Pimentel</h1>
<p style="color:red;">Antenção!</p>
<p>O atendimento rápido é usado em casos onde se necessite o suporte de um veterinario em sua residência.<br>
    Você receberá um email quando o veterinário atender ao chamado.
</p>
<form method="POST" action="processa_aten.php">

    Ocorrido:<input type="text" required="" name="ocorrido"><br>
    Detalhes:<br>
    <textarea required="" name="detalhes" rows="10" cols="40"></textarea><br><br>
    Escolha o pet que irá fazer a consulta:
        <table border="2">
    <thead>
        <tr>
            <th>Nome</th>
        </tr>
    <thead>
        <?php 
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
    <tbody>
    <tr>
        <td><?php echo "<p></p>".$row['nome']; ?></td>
        <td><input type="radio" required="" name="pet" value="<?php echo $row['id_pet'];?>">Escolher</button></td>
    </tr>
    </tbody>
        <?php } ?>
        </table>
    <input type="submit" name="enviar" value="Enviar">
</form>
</body>
