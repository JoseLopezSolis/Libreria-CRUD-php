<?php
include 'db.php';
include 'page/header.php';
$idAutor = $_GET['idAutor'];
?>
    <main id="edit-form">
            <div class="main-header">
                <h2>Editar autores</h2>
                <br>
                <h4>Rellena los campos para continuar</h4>
            </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Autor</th>
                <th>Año nacimiento</th>
                <th>Año fallecimiento</th>
                <th>Lugar nacimiento</th>
                <th>Vida</th>
                <th>Estilo</th>
                <th>Ref Epoca</th>
            </tr>
                <?php
                $query = "SELECT * FROM autores WHERE idAutor = '$idAutor'";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <form method="POST">
                            <td><?php echo $row['idAutor']?><input type="hidden" name="concurrentAuthorId" value="<?php echo $row['idAutor']?>"></td>
                            <td><input placeholder="" name="autor" class="edit-user" type="text" value="<?php echo $row['Autor']?>"></td>
                            <td><input placeholder=" " name="anoNac"  class="edit-user"  type="text" value="<?php echo $row['AñoNacimiento']?>"></td>
                            <td><input placeholder=""  name="lugarFall" class="edit-user" type="text" value="<?php echo $row['AñoFallecimiento']?>"></td>
                            <td><input placeholder=" " name="lugarNac" class="edit-user" type="text" value="<?php echo $row['LugarNacimiento']?>"></td>
                            <td><input placeholder=" " name="vida" class="edit-user" type="text" value="<?php echo $row['Vida']?>"></td>
                            <td><input placeholder=" " name="estilo" class="edit-user" type="text" value="<?php echo $row['Estilo']?>"></td>
                            <td><input placeholder=" " name="refEpoca" class="edit-user" type="text" value="<?php echo $row['RefEpoca']?>"></td>
                    </tr>
                <?php } ?>
            </tr>
        </table>
                <button type="submit" name="edit" class="edit-record-button btn-hover color-1">Actualizar datos</button>
                <?php
                //edit record
                if(isset($_POST['edit'])){
                    $idAutor = $_POST['concurrentAuthorId'];
                    $nombreAut = $_POST['autor'];
                    $anoNac = $_POST['anoNac'];
                    $anoFallec = $_POST['lugarFall'];
                    $lugarNac = $_POST['lugarNac'];
                    $vida = $_POST['vida'];
                    $estilo = $_POST['estilo'];
                    $refEpoca = $_POST['refEpoca'];
                    $query = "UPDATE autores SET Autor = '$nombreAut', AñoNacimiento = '$anoNac', AñoFallecimiento = '$anoFallec', LugarNacimiento = '$lugarNac', Vida = '$vida', Estilo = '$estilo', RefEpoca = '$refEpoca' WHERE idAutor = '$idAutor'";
                    $result = mysqli_query($con, $query);
                    if($result){
                        echo "<script>window.open('agregarAutor.php', '_self')</script>";
                    }
                }
               
                ?>
        </form>
        </main>
    </div>