<?php
include 'db.php';
include 'page/header.php';
$idGenero = $_GET['idGenero'];
?>
    <main id="edit-form">
            <div class="main-header">
                <h2>Editar genero</h2>
                <br>
                <h4>Rellena los campos para continuar</h4>
            </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Genero</th>
            </tr>
                <?php
                $query = "SELECT * FROM genero WHERE idGenero = '$idGenero'";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <form method="POST">
                            <td><?php echo $row['IdGenero'] ?><input type="hidden" name="idGenero" value="<?php echo $row['IdGenero']?>"></td>
                            <td><input type="text" name="genero" value="<?php echo $row['Genero'] ?>"></td>
                            <td>
                    </tr>
                <?php } ?>
            </tr>
        </table>
                <button type="submit" name="edit" class="edit-record-button btn-hover color-1">Actualizar datos</button>
                <?php
                //edit record
                if (isset($_POST['edit'])) {
                    if (isset($_POST['genero']) !== "") {
                        $idGenero = $_POST['idGenero'];
                        $genero = $_POST['genero'];
                        $query = "UPDATE genero SET Genero = '$genero' WHERE IdGenero = '$idGenero'";
                        $result = mysqli_query($con, $query);
                        if (!$result) {
                            die("Query Failed.");
                        }
                        if($result){
                            echo "<script>window.open('agregarGenero.php','_self')</script>";
                        }
                    }
                }
                
                ?>
        </form>
        </main>
    </div>