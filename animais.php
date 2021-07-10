<!DOCTYPE html>
<?php
session_start();

require 'init.php';
?>

<head>
<html lang = "Pt-Br">
<meta charset = "utf-8">
<title>Pet Shop!</title>

</head>
<body>
<h1>Pet Shop</h1>
<h1>Pimentel</h1>

        <li> <a href="http://localhost/PetShop/indexu.php">Início</a></li>
        <li> <a href="http://localhost/PetShop/animais.php">Animais</a></li>
        <li> <a href="http://localhost/PetShop/loja/loja.php">Produtos</a></li>
        <li> <a href="http://localhost/PetShop/consulta.php">Consultas</a></li>
        <li> <a href="http://localhost/PetShop/cadastro.php">Cadastrar</a></li>
        </ul>
    </div>
</nav>  
 
<h1>Loja de Animais</h1>
<p>Antenção, a compra de animais é efetuada somente de forma presencial</p>
     
<?php if (isLoggedIn()): ?>
<p>Olá, <?php echo $_SESSION['name_user']; ?>. <a href="http://localhost/PetShop/panel.php">Painel</a> | <a href="http://localhost/PetShop/logout.php">Sair</a><a href="http://localhost/PetShop/aten_rapido.php">Antendimento Rapido</a></p>
<?php else: ?>
<p>Não cadastrado? Cadastre-se já! <a href="http://localhost/PetShop/cadastro.php">Cadastrar</a></p>
<?php endif;


$PDO = db_connect();
    
        $sql = "SELECT * FROM animais";

        $stmt = $PDO->prepare($sql);

        $stmt->execute();
        ?>

        <?php 
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
    <img src="animais/<?php echo $row['foto'];?>" width="20%">
    <tbody>
    <tr>
        <?php echo "<p>Especie: ",$row['especie']; ?> 
        <?php echo " Raça: " .$row['raça']; ?> 
        <?php echo " Sexo: ".$row['sexo']; ?> 
        <?php echo " Preço: ".$row['preço']."</p>"; ?>
        <?php } ?>
</body>
</html>

