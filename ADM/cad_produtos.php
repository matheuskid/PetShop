<?php


session_start();
 
require_once 'init.php';
require 'check.php';

if(isset($_FILES['arquivo'])){

    $nome = isset($_POST['nome'])?$_POST['nome']: "";
    $tipo = isset($_POST['tipo'])?$_POST['tipo']:"";
    $preco = isset($_POST['preço'])?$_POST['preço']:"" ;
    $quantidade = isset($_POST['quantidade'])?$_POST['quantidade']:"";

    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novo_nome = time().$extensao;
    $diretorio = "../loja/";
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

    $PDO = db_connect();
    $sql = "INSERT INTO produtos (nome, tipo, preço, quantidade, foto) VALUES ('$nome', '$tipo', '$preco', '$quantidade', '$novo_nome')";

    $stmt = $PDO->prepare($sql);

    $stmt->execute();

    $id = $PDO->lastInsertId();

     $conteudo = file_get_contents("paginaproduto_padrao.txt");

     file_put_contents("../loja/produto".$id.".php", '<?php $id='.$id.$conteudo);

     $link = "produto".$id.".php";
     $sql = "UPDATE produtos SET link = '$link' WHERE id_produto = '$id'";

     $stmt2 = $PDO->prepare($sql);

     $stmt2->execute();
}

     ?>

<h1>Adicionar produto</h1>
<form action="cad_produtos.php" method="POST" enctype="multipart/form-data">
    Nome: <input type="text" required="" name="nome"><br>
    Tipo: <input type="text" required="" name="tipo"><br>
    Preço: <input typr="text" required="" name="preço"><br>
    Quantidade: <input type="number" required="" name="quantidade">
    Foto: <input type="file" required="" name="arquivo">

    <input type="submit" value="enviar">
    </form>