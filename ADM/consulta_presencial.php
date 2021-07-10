<?php
include 'init.php';
session_start();
$PDO = db_connect();

if(isset($_POST['nome'])){
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$nome_pet = isset($row['nome']) ? $row['nome'] : $_POST['nome_pet'];
$sexo = isset($row['sexo']) ? $row['sexo'] : $_POST['sexo'];
$raca = isset($row['raça']) ? $row['raça'] : $_POST['raça'];
$especie = isset($row['especie']) ? $row['especie'] : $_POST['especie'];
$tipo_sang = isset($row['tipo_sang']) ? $row['tipo_sang'] : $_POST['tipo_sang'];
$tipo = $_POST['consulta'];
$data = date("Y/m/d");


$sql = "INSERT INTO consultas( tipo, nome, telefone, rua, numero, nome_pet, sexo, raça, especie, tipo_sanguineo, data, estatus)
 VALUES ('$tipo', '$nome', '$telefone', '$rua', '$numero', '$nome_pet', '$sexo', '$raca','$especie','$tipo_sang', '$data', 'pendente' )";

$stmt = $PDO->prepare($sql);

$stmt->execute();

header('Location: consulta_presencial.php');
}
?>
<h2>Marcar Consulta</h2>
        <form action="consulta_presencial.php" method="post">
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
                <input type="text" id="nome" name="nome" required="" style="width: 10em" >
                </div>
                <div class="campo">
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone" required="" style="width: 10em" >
                </div>

            <fieldset class="grupo">
                <div class="campo">
                <label for="Rua">Rua</label>
                <input type="text" id="rua" name="rua" required="" style="width: 10em" >
                </div>
                <div class="campo">
                <label for="numero">Numero</label>
                <input type="number" id="numero" name="numero" required="" style="width: 10em">
                </div>
            </fieldset>
            </fieldset>
            </fieldset>
    </form>

            Pet:
            <fieldset>
            <fieldset class="grupo">
                <div class="campo">
                <label for="nome">Nome</label>
                <input type="text" id="nome_pet" name="nome_pet" required="" style="width: 10em" >
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
                <input type="text" id="especi" name="especie" required="" style="width: 20em" >
                </div>
                <div class="campo">
                <label for="raca">Raça</label>
                <input type="text" id="raça" name="raça" required="" style="width: 20em" >
                </div>
                <div class="campo">
                <label for="Tipo Sanguineo">Tipo Sanguineo</label>
                <input type="text" id="tipo_sang" name="tipo_sang" required="" style="width: 10em" >
                </div>
            </fieldset>
            <input type="submit" value="Marcar">
        </form>
                     


    </body>
