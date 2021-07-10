<?php
include 'init.php';
 
$PDO = db_connect();

if(empty($_POST['nome'])){
    echo "erro";
}else{

$nome = $_POST['nome']." ".$_POST['snome'];
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];
$cartao = $_POST['cartão'];
$data_nasc = $_POST['data_nasc'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];
$telefone = $_POST['telefone'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];


$sql = "INSERT INTO clientes ( nome, senha, cpf, cartão, email, sexo, telefone, rua, numero, data_nasc)
 VALUES ('$nome', '$senha', '$cpf', '$cartao', '$email', '$sexo', '$telefone', '$rua', '$numero', '$data_nasc')";

$stmt = $PDO->prepare($sql);

$stmt->execute();


$sql = "SELECT id_user, nome FROM clientes WHERE nome = :nome AND senha = :senha";
 
$stmt1 = $PDO->prepare($sql);

//vinculando as variaveis
$stmt1->bindParam(':senha', $senha);
$stmt1->bindParam(':nome', $nome);
$stmt1->execute();

$users = $stmt1->fetchAll(PDO::FETCH_ASSOC);

$user = $users[0];
 
session_start();
$_SESSION['logged_in'] = true;
$_SESSION['id_user'] = $user['id_user'];
$_SESSION['name_user'] = $user['nome'];
 

header("Location: cadastro_pet.php");
}
?>