<?php
include 'init.php';

$PDO = db_connect();
session_start();
$id_dono = $_SESSION['id_user'];
if(isset($_POST['pet'])){
    $id_pet = $_POST['pet'];
    $sql = "SELECT * FROM pet WHERE id_dono = '$id_dono' AND id_pet = '$id_pet'";

    $inf = $PDO->prepare($sql);

    $inf->execute();

    $row = $inf->fetch(PDO::FETCH_ASSOC);
}
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$nome_pet = isset($row['nome']) ? $row['nome'] : $_POST['nome_pet'];
$sexo = isset($row['sexo']) ? $row['sexo'] : $_POST['sexo'];
$raca = isset($row['raça']) ? $row['raça'] : $_POST['raça'];
$especie = isset($row['especie']) ? $row['especie'] : $_POST['especie'];
$tipo_sang = isset($row['tipo_sang']) ? $row['tipo_sang'] : $_POST['tipo_sang'];
$tipo = $_POST['consulta'];
$data = date("Y/m/d");


$sql = "INSERT INTO consultas( tipo, nome, telefone, rua, numero, nome_pet, sexo, raça, especie, tipo_sanguineo, data, estatus)
 VALUES ('$tipo', '$nome', '$telefone', '$rua', '$numero', '$nome_pet', '$sexo', '$raca','$especie','$tipo_sang', '$data', 'pendente' )";

$stmt = $PDO->prepare($sql);

$stmt->execute();

header('Location: consulta.php');
?>