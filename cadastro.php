<!DOCTYPE html>
<?php 
include 'init.php';
session_start();
if(isLoggedIn()){
    echo "Você já esta cadastrado ".$_SESSION['name_user']."!";
    echo "<a href='http://localhost/PetShop/indexu.php'>Index</a>";
}else{?>
<html>
    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="">
    </head>
    <body>

            <h1>Cadastrar usuario</h1>
            <form action="addcliente.php" method="post">
                <fieldset>
                    <fieldset class="grupo">
                        <div class="campo">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" required="" style="width: 10em" value="">
                        </div>
                        <div class="campo">
                            <label for="snome">Sobrenome</label>
                            <input type="text" id="snome" name="snome" required="" style="width: 10em" value="">
                        </div>
                        <label for="senha">Senha</label>
                        <input type="text" id="senha" name="senha" required="" style="width: 10em"><br>
                        <label for="data_nasc">Nascimento</label>
                         <input type="date" id="data_nasc" name="data_nasc" required="" style="width: 10em"><br>
                         <label for="cpf">Cpf</label>
                         <input type="text" id="cpf" name="cpf" required="" style="width: 10em">
                         <label for="cartão">Numero de Cartão</label>
                         <input type="text" id="cartão" name="cartão" required="" style="width: 10em">
                    </fieldset>
                    <div class="campo">
                        <label>Sexo</label>
                        <label>
                            <input type="radio" name="sexo" required="" value="masculino"> Masculino
                        </label>
                        <label>
                            <input type="radio" name="sexo" required="" value="feminino"> Feminino
                        </label>
                    </div>
                    <div class="campo">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" required="" style="width: 20em" value="">
                    </div>
                    <div class="campo">
                        <label for="telefone">Telefone</label>
                        <input type="text" id="telefone" name="telefone" required="" style="width: 10em" value="">
                    </div>
                    Endereço:
                    <fieldset class="grupo">
                            <div class="campo">
                                <label for="Rua">Rua</label>
                                <input type="text" id="rua" name="rua" required="" style="width: 10em" value="">
                                <label for="numero">Numero</label>
                                <input type="number" id="numero" name="numero" required="" style="width: 10em" value="">
                            </div>
                        </fieldset>
                        <input type="submit" value="Proximo">
                        </fieldset>
                        </form>

<?php } ?>                
    </body>
</html>