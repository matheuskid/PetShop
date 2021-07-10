<!DOCTYPE html>
<?php 
session_start();

$id_dono = $_SESSION['id_user'];
?>
<html>
    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="">
    </head>
    <body>

    <h2>Cadastrar Pet</h2>

                <form action="addpet.php?id_dono=<?php echo $id_dono?>" method="post">
                <fieldset>
                    <fieldset class="grupo">
                        <div class="campo">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" required="" style="width: 10em" value="">
                        </div>
                        <label for="data_nasc">Nascimento</label>
                         <input type="date" id="data_nasc" name="data_nasc" required="" style="width: 10em">
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
                        <label for="especie">Especie</label>
                        <input type="text" id="especie" name="especie" required="" style="width: 20em" value="">
                    </div>
                    <div class="campo">
                        <label for="raca">Raça</label>
                        <input type="text" id="raca" name="raca" required="" style="width: 20em" value="">
                    </div>
                    <div class="campo">
                        <label for="Tipo Sanguineo">Tipo Sanguineo</label>
                        <input type="text" id="tipo_sang" name="tipo_sang" required="" style="width: 10em" value="">
                    </div>
            
                
                        <input type="submit" value="Finalizar">
                        </fieldset>
                        </form>
             
    </body>
</html>