<?php
session_start();
 
require_once 'init.php';
require 'check.php';
//$PDO = db_connect();

//if(isset($_POST['id_produto'])?$_POST['id_produto']:""){
//$id_produto = $_POST['id_produto'];

//$sql = "DELETE FROM produtos WHERE id_produto = '$id_produto'";

//$stmt = $PDO->prepare($sql);

//$stmt->execute();
//}?>
<body>
    <h1>Produtos</h1>
    <a href="cad_produtos.php">|Adicionar Produtos|</a><br><br>
<?php

    $PDO = db_connect();
    $sql = "SELECT id_produto, nome, quantidade, preço, link FROM produtos";

    $stmt2 = $PDO->prepare($sql);

    $stmt2->execute();
    while($rows_produtos = $stmt2->fetch(PDO::FETCH_ASSOC)){?>
    <table border="2">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Link</th>
            <th>Preço</th>
            <th>Quantidade</th>
        </tr>
    </thead>
    <tbody>
        <tr>
      <td><?php echo $rows_produtos['id_produto'];?></td>
      <td><?php echo $rows_produtos['nome'];?></td>
      <td><?php echo $rows_produtos['link'];?></td>
      <td><?php echo $rows_produtos['preço'];?></td>
      <td><?php echo $rows_produtos['quantidade'];?></td>

<?php }?>

        
</body>
</html>