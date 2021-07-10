<!DOCTYPE html>
<?php 
include 'init.php';
session_start();

if(isLoggedIn()){
    $PDO = db_connect();
    $id_user = $_SESSION['id_user'];
    $sql = "SELECT * FROM clientes WHERE id_user = '$id_user'";

    $stmt = $PDO->prepare($sql);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}
    ?>

    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="">
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
        <p>Olá, <?php echo $_SESSION['name_user']; ?>. <a href="http://localhost/PetShop/panel.php">Painel</a> | <a href="http://localhost/PetShop/logout.php">Sair</a><a href="http://localhost/PetShop/aten_rapido.php">Antendimento Rapido</a></p>
    <?php else: ?>
        <p>Não cadastrado? Cadastre-se já! <a href="http://localhost/PetShop/cadastro.php">Cadastrar</a></p>
    <?php endif; ?>


        <h2>Marcar Consulta</h2>
        <form action="marcar_consulta.php" method="post">
            Consulta:
            <fieldset class="grupo">
                <div class="campo">
                <label>
                <input type="radio" name="consulta" required="" value="vistoria"> Vistoria
                </label>
                <label>
                <input type="radio" name="consulta" required="" value="vacina"> Vacina
                </label>
                <label>
                <input type="radio" name="consulta" required="" value="cirurgia"> Cirurgia
                </label>
                </div>
            </fieldset>
            Dono:
            <fieldset>
            <fieldset class="grupo">
                <div class="campo">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required="" value="<?php echo isset($result['nome']) ? $result['nome'] : "";?>" style="width: 10em" value="">
                </div>
                <div class="campo">
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone" required="" value="<?php echo isset($result['telefone']) ? $result['telefone'] : "";?>" style="width: 10em" value="">
                </div>

            <fieldset class="grupo">
                <div class="campo">
                <label for="Rua">Rua</label>
                <input type="text" id="rua" name="rua" required="" value="<?php echo isset($result['rua']) ? $result['rua'] : "";?>" style="width: 10em" value="">
                </div>
                <div class="campo">
                <label for="numero">Numero</label>
                <input type="number" id="numero" name="numero" required="" value="<?php echo isset($result['numero']) ? $result['numero'] : "";?>" style="width: 10em">
                </div>
            </fieldset>
            </fieldset>
            </fieldset>
    <?php if(isLoggedIn()){
        $sql = "SELECT id_pet, nome FROM pet WHERE id_dono = '$id_user'";

        $stmt2 = $PDO->prepare($sql);
            
        $stmt2->execute();
        ?>
        Escolha o pet que irá fazer a consulta:
        <table border="2">
    <thead>
        <tr>
            <th>Nome</th>
        </tr>
    <thead>
        <?php 
        while($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
        ?>
    <tbody>
    <tr>
        <td><?php echo "<p></p>".$row['nome']; ?></td>
        <td><input type="radio" name="pet" value="<?php echo $row['id_pet'];?>"></td>
    </tr>
    <?php } ?>
    </tbody>
    </table>
    <input type="submit" value="marcar">
    </form>
   <?php }else{ ?>
            Pet:
            <fieldset>
            <fieldset class="grupo">
                <div class="campo">
                <label for="nome">Nome</label>
                <input type="text" id="nome_pet" name="nome_pet" required="" style="width: 10em" value="">
                </div>
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
                <label for="especie">Especie</label>
                <input type="text" id="especi" name="especie" required="" style="width: 20em" value="">
                </div>
                <div class="campo">
                <label for="raca">Raça</label>
                <input type="text" id="raça" name="raça" required="" style="width: 20em" value="">
                </div>
                <div class="campo">
                <label for="Tipo Sanguineo">Tipo Sanguineo</label>
                <input type="text" id="tipo_sang" name="tipo_sang" required="" style="width: 10em" value="">
                </div>
            </fieldset>
            <input type="submit" value="Marcar">
        </form>
                     

   <?php } ?>
    </body>
