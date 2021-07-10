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
                <ul>
                <li> <a href="http://localhost/PetShop/indexu.php">Início</a></li>
                <li> <a href="http://localhost/PetShop/animais.php">Animais</a></li>
                <li> <a href="http://localhost/PetShop/loja/loja.php">Produtos</a></li>
                <li> <a href="http://localhost/PetShop/consulta.php">Consultas</a></li>
                <li> <a href="http://localhost/PetShop/cadastro.php"></i>Cadastrar</a></li>
                </ul>
             
    <?php if (isLoggedIn()): ?>
        <p>Olá, <?php echo $_SESSION['name_user']; ?> <a href="http://localhost/PetShop/panel.php">Painel</a> | <a href="http://localhost/PetShop/logout.php">Sair</a> <a href="http://localhost/PetShop/aten_rapido.php">Antendimento Rapido</a></p>
    <?php else: ?>
        <h1>Sistema de Login </h1>
        <h1>Login</h1>
             
        <form action="login.php" method="post">
        <label for="Nome">Nome: </label>
            <br>
        <input type="text" name="nome" required="" id="nome">
             
            <br><br>
             
        <label for="password">Senha: </label>
            <br>
        <input type="password" name="senha" required="" id="senha">
             
            <br><br>
             
        <input type="submit" value="Entrar">
        </form>             
        <p>Não cadastrado? Cadastre-se já! <a href="cadastro.php">Cadastrar</a></p>
    <?php endif; ?>
</body>
</html>