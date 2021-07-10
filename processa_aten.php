<?php
include 'init.php';
session_start();

$PDO = db_connect();

$id_dono = $_SESSION['id_user'];
$id_pet = $_POST['pet'];
$ocorrido = $_POST['ocorrido'];
$detalhes = $_POST['detalhes'];
date_default_timezone_set('America/Sao_Paulo');
$hora = date('H:i:s'); 


$sql = "INSERT INTO AR (id_dono, id_pet, ocorrido, detalhes, hora, estatus) VALUES ('$id_dono','$id_pet', '$ocorrido', '$detalhes', '$hora', 'pendente' );";

$stmt = $PDO->prepare($sql);

$stmt->execute();

header('Location: panel.php');
?>