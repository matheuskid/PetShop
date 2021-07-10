<?php $id=21;

session_start();
 
require 'init.php';

$compra = isset($_SESSION['compra'])?$_SESSION['compra']:"";
if($compra==1){?>
    <script>
        alert('Compra efetuada com sucesso!');
    </script>
    <?php
    unset($_SESSION['compra']);
    unset($compra);
}
?>

	<head>
    <html lang = "Pt-Br">
    <meta charset = "utf-8">
    <title>Pet Shop!</title>

    </head>
    <body>
    <h1>Pet Shop</h1>
    <h1>Pimentel</h1>
                <ul>
                <li> <a href="http://localhost/PetShop/indexu.php">Início</a></li>
                <li> <a href="http://localhost/PetShop/animais.php">Animais</a></li>
                <li> <a href="http://localhost/PetShop/loja/loja.php">Produtos</a></li>
                <li> <a href="http://localhost/PetShop/consulta.php">Consultas</a></li>
                <li> <a href="http://localhost/PetShop/cadastro.php"></i>Cadastrar</a></li>
                </ul>
    <h1>Loja</h1>
    <?php if (isLoggedIn()): ?>
        <p>Olá, <?php echo $_SESSION['name_user']; ?>. <a href="http://localhost/PetShop/panel.php">Painel</a> | <a href="http://localhost/PetShop/logout.php">Sair</a><a href="http://localhost/PetShop/aten_rapido.php">Antendimento Rapido</a></p>
    <?php else: ?>
        <p>Não cadastrado? Cadastre-se já! <a href="http://localhost/PetShop/cadastro.php">Cadastrar</a></p>
    <?php endif;?>

    <form method="GET">
            Pesquise um produto: <input type="text" name="pesquisar">
        </form>
<?php if(isset($_GET['pesquisar'])){
    $pesquisa = $_GET['pesquisar'];

    $PDO = db_connect();
    $sql = "SELECT link, nome, quantidade FROM produtos WHERE nome LIKE '%$pesquisa%'";

    $stmt = $PDO->prepare($sql);

    $stmt->execute();
    while($rows_produtos = $stmt->fetch(PDO::FETCH_ASSOC)){
          echo "Produto: <a href=".$rows_produtos['link'].">".$rows_produtos['nome']." </a>(".$rows_produtos['quantidade'].")<br>";
    }}

    $PDO = db_connect();
    $sql = "SELECT id_produto, nome, quantidade, preço, foto FROM produtos WHERE id_produto = '$id'";
    
    $quan = $PDO->prepare($sql);
    
    $quan->execute();
    $rows = $quan->fetch(PDO::FETCH_ASSOC);
    if($rows['quantidade']>0):
     
    ?>
    
    <p><?php echo $rows['nome'];?></p>
    <img src="<?php echo $rows['foto'];?>" ></img>
    <p>Descrição
    quantidade = <?php echo $rows['quantidade'];?>
    preço = <?php echo $rows['preço'];?>
    
    </p>
    <?php if(isLoggedIn()){ ?>
    <form action="processa_compra.php?produto_id=<?php echo $rows['id_produto'];?>&quantidade=<?php echo $rows['quantidade']; ?>" method="POST">
    Suas informações já estão no sistema, apenas compre!<br>
    Quantidade: <input type="number" required="" min="1" max="<?php echo $rows['quantidade']; ?>" name="qntd_comprada"> <input type="submit" value="comprar">
    <input type="hidden" name="preço" value="<?php echo $rows['preço'];?>">
    </form>
    <?php }else{?>
    <form action="processa_compra.php?produto_id=<?php echo $rows['id_produto'];?>&quantidade=<?php echo $rows['quantidade']; ?>" method="POST">
    Nome: <input type="text" required="" name="nome"><br>
    cpf: <input type="text" required="" name="cpf"><br>
    Email: <input type="text" required="" name="email"><br>
    Rua: <input type="text" required="" name="rua"><input type="number" required="" name="numero"><br>
    Telefone: <input type="text" required="" name="telefone"><br>
    Cartão: <input type="text" required="" name="cartao"><br>
    Quantidade: <input type="number" required="" min="1" max="<?php echo $rows['quantidade']; ?>" name="qntd_comprada"> <input type="submit" value="comprar">
    <input type="hidden" name="preço" value="<?php echo $rows['preço'];?>">
    <?php } ?>
    <?php else:?>
    <p style="color:red;">Produto esgotado!</p> 
    <p><?php echo $rows['nome'];?></p>
    <img src="<?php echo $rows['fotos'];?>" ></img>
    <p>Descrição
    </p>
<?php endif; 

