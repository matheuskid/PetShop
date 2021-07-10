<?php 
include 'init.php';

$PDO = db_connect();

$id = $_POST['id'];
$sql = "UPDATE ar SET estatus = 'atendido' WHERE id_ocorrencia = '$id'";

$stmt = $PDO->prepare($sql);

$stmt->execute();

header('Location: panel_vet.php');
