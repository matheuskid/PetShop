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
                <li> <a href="http://localhost/PetShop/cadastro.php"></i>Cadastrar</a></li>
                </ul>
            </div>
        </nav>  
         
        <h1>Loja</h1>
             
    <?php if (isLoggedIn()): ?>
        <p>Olá, <?php echo $_SESSION['name_user']; ?>. <a href="http://localhost/PetShop/panel.php">Painel</a> | <a href="http://localhost/PetShop/logout.php">Sair</a><a href="http://localhost/PetShop/aten_rapido.php">Antendimento Rapido</a></p>
    <?php else: ?>
            <p>Não cadastrado? Cadastre-se já! <a href="http://localhost/PetShop/cadastro.php">Cadastrar</a></p>
            <?php endif; ?>
        
        <form method="GET">
            Pesquise um produto: <input type="text" name="pesquisar">
        </form>
<?php if(isset($_GET['pesquisar'])){
    $pesquisa = $_GET['pesquisar'];

    $PDO = db_connect();
    $sql = "SELECT link, nome, quantidade, foto FROM produtos WHERE nome LIKE '%$pesquisa%'";

    $stmt = $PDO->prepare($sql);

    $stmt->execute();
    while($rows_produtos = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "Produto: <a href=".$rows_produtos['link'].">".$rows_produtos['nome']." </a>(".$rows_produtos['quantidade'].")<br>";
    }
}?>
<br>
<br>
Produtos:<br>
<?php

    $PDO = db_connect();
    $sql = "SELECT link, nome, quantidade, foto, preço FROM produtos ORDER BY tipo";

    $stmt = $PDO->prepare($sql);

    $stmt->execute();
    while($rows_produtos = $stmt->fetch(PDO::FETCH_ASSOC)){
      echo "<a href=".$rows_produtos['link']."><img src=".$rows_produtos['foto']." heigth=\"20%\" width=\"20%\"><br><a href=".$rows_produtos['link'].">".$rows_produtos['nome']." </a>(".$rows_produtos['quantidade'].")<br>Preço:".$rows_produtos['preço']."<br>";
}?>

        
</body>
</html>