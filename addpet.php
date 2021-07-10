<?php
session_start();

include 'init.php';

if(isLoggedIn()==false){
    echo "erro, usuario não conectado";
}else{

$PDO = db_connect();

$id_dono = $_SESSION['id_user'];
$nome = $_POST['nome'];
$data_nasc = $_POST['data_nasc'];
$sexo = $_POST['sexo'];
$raca = $_POST['raca'];
$especie = $_POST['especie'];
$tipo_sang = $_POST['tipo_sang'];

$sql = "INSERT INTO pet ( nome, id_dono, raça, especie, data_nasc, sexo, tipo_sang)
VALUES ('$nome', '$id_dono', '$raca', '$especie', '$data_nasc', '$sexo', '$tipo_sang')";

$stmt = $PDO->prepare($sql);

$stmt->execute();

header('Location: panel.php');
}
?>