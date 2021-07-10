<?php
session_start();
 
require_once 'init.php';
require 'check.php';

if(isset($_FILES['arquivo'])){

    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novo_nome = time().$extensao;
    $diretorio = "../animais/";

    $especie = isset($_POST['especie'])?$_POST['especie']: "";
    $sexo = isset($_POST['sexo'])?$_POST['sexo']: "";
    $raca = isset($_POST['raça'])?$_POST['raça']:"";
    $preco = isset($_POST['preço'])?$_POST['preço']:"" ;
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

    $PDO = db_connect();
    $sql = "INSERT INTO animais (especie, sexo, raça, preço, foto) VALUES ('$especie', '$sexo', '$raca', '$preco','$novo_nome')";

    $stmt = $PDO->prepare($sql);

    $stmt->execute();
}

?><h1>Adicionar animal</h1>
<form action="cad_animais.php" method="POST" enctype="multipart/form-data">
    Especie: <input type="text" required="" name="especie">
    Sexo: <input type="radio" required="" name ="sexo" value="macho">Macho  <input type="radio" required="" name ="sexo" value="femea"> Femea <br>
    Raça: <input type="text" required="" name="raça"><br>
    Preço: <input typr="text" required="" name="preço"><br>
    Foto: <input type="file" required name="arquivo">

    <input type="submit" value="enviar">
    </form>