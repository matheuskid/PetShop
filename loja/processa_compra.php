<?php
    session_start();
    include 'init.php';

    $PDO = db_connect();
    $id_user = isset($_SESSION['id_user'])?$_SESSION['id_user']:"";

    if(isLoggedIn()){
    $sql = "SELECT nome, cpf, email, telefone, rua, numero, cartão FROM clientes WHERE id_user = '$id_user'";

    $stmt = $PDO->prepare($sql);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $nome = $row['nome'];
    $cpf = $row['cpf'];
    $email = $row['email'];
    $telefone = $row['telefone'];
    $rua = $row['rua'];
    $numero = $row['numero'];
    $cartao = $row['cartão'];

    }else{ 
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $cartao = $_POST['cartao'];
    }
    //$id_produto = $_GET['produto_id'];
    //$quantidade = $_GET['quantidade'];
    //--$quan;
    $sql2 = "INSERT INTO comprador(nome, cpf, email, telefone, rua, numero, cartão) VALUES ('$nome', '$cpf', '$email', '$telefone', '$rua', '$numero', '$cartao')";

    $stmt2 = $PDO->prepare($sql2);

    $stmt2->execute();

    $id_comprador = $PDO->lastInsertId();

    $id_produto = $_GET['produto_id'];
    $qntd_comprada = $_POST['qntd_comprada'];
    $quantidade = $_GET['quantidade'];

    $quan = $quantidade - $qntd_comprada;

    $sql3 = "UPDATE produtos SET quantidade = '$quan' WHERE id_produto = '$id_produto'";

    $stmt3 = $PDO->prepare($sql3);

    $stmt3->execute();

    $preco_total = $_POST['preço'] * $qntd_comprada;
    $sql4 = "INSERT INTO compras (id_produto, id_comprador, quantidade, valor) VALUES ('$id_produto','$id_comprador', '$qntd_comprada', '$preco_total')";

    $stmt4 = $PDO->prepare($sql4);
    if($stmt4->execute()==true){
    $_SESSION['compra']=1;
}else{
    $_SESSION['compra']=0;
}

    header("Location: http://localhost/PetShop/loja/produto$id_produto.php");
?>