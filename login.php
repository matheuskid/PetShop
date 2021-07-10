<?php
 
// inclui o arquivo de inicialização
require_once 'init.php';


// resgata variáveis do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$password = isset($_POST['senha']) ? $_POST['senha'] : '';
 
if (empty($nome) || empty($password))
{
    echo "Informe nome e senha";
    exit;
}
 

 
$PDO = db_connect();
 
$sql = "SELECT id_user, nome FROM clientes WHERE nome = :nome AND senha = :senha";
$stmt = $PDO->prepare($sql);

$stmt->bindParam(':nome', $nome);        //comparando as variaveis
$stmt->bindParam(':senha', $password);
 
$stmt->execute();
 
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
if (count($users) <= 0)
{
    echo "Nome ou senha incorretos";
    exit;
}
 
// pega o primeiro usuário
$user = $users[0];
 
session_start();
$_SESSION['logged_in'] = true;
$_SESSION['id_user'] = $user['id_user'];
$_SESSION['name_user'] = $user['nome'];
 
header('Location: panel.php');
?>