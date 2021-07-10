<?php
session_start();
 
require_once 'init.php';
require 'check.php';
$PDO = db_connect();
$id_pet = $_POST['id_pet'];

if(isset($_POST['apagar'])){

$sql = "DELETE FROM pet WHERE id_pet = '$id_pet'";

$stmt = $PDO->prepare($sql);

$stmt->execute();

}else if(isset($_POST['altera'])){
    echo $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $nasc = $_POST['nasc'];
    $raca = $_POST['raça'];
    $sexo = $_POST['sexo'];
    $sang = $_POST['sang'];

    $sql = "UPDATE pet SET nome='$nome', especie='$especie',  raça='$raca', data_nasc='$nasc', sexo='$sexo', tipo_sang='$sang' WHERE id_pet = '$id_pet'";
    $stmt = $PDO->prepare($sql);

    $stmt->execute();
}
header('Location: panel.php');
?>