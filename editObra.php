<?php
include 'db.php';
include 'page/header.php';
$idObra = $_GET['idObra'];
?>
    <main id="edit-form">
            <div class="main-header">
                <h2>Editar obra</h2>
                <br>
                <h4>Rellena los campos para continuar</h4>
            </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Año primera edicion</th>
                <th>Argumento</th>
                <th>Critica</th>
                <th>Autor</th>
                <th>Epoca</th>
                <th>Genero</th>
            </tr>
                <?php
                $query = "SELECT * FROM obras WHERE IdObra = '$idObra'";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <form method="POST">
                            <td><?php echo $row['IdObra'] ?><input type="hidden" name="idObra" value="<?php echo $row['IdObra']?>"></td>
                            <td><input type="text" name="titulo" value="<?php echo $row['Titulo'] ?>"></td>
                            <td><input type="text" name="añoPrimeraEdicion" value="<?php echo $row['AñoPrimeraEdicion'] ?>"></td>
                            <td><input type="text" name="argumento" value="<?php echo $row['Argumento'] ?>"></td>
                            <td><input type="text" name="critica" value="<?php echo $row['Critica'] ?>"></td>
                            <td><input type="text" name="refAutor" value="<?php echo $row['RefAutor'] ?>"></td>
                            <td><input type="text" name="refEpoca" value="<?php echo $row['RefEpoca'] ?>"></td>
                            <td><input type="text" name="refGenero" value="<?php echo $row['RefGenero'] ?>"></td>
                            <td>
                    </tr>
                <?php } ?>
            </tr>
        </table>
                <button type="submit" name="edit" class="edit-record-button btn-hover color-1">Actualizar datos</button>
                <?php
                //edit record 
                if (isset($_POST['edit'])) {
                    if (isset($_POST['titulo']) !== "") {
                        $idObra = $_POST['idObra'];
                        $titulo = $_POST['titulo'];
                        $anoPrimeraEdicion = $_POST['añoPrimeraEdicion'];
                        $argumento = $_POST['argumento'];
                        $critica = $_POST['critica'];
                        $refAutor = $_POST['refAutor'];
                        $refEpoca = $_POST['refEpoca'];
                        $refGenero = $_POST['refGenero'];
                        $query = "UPDATE obras SET Titulo = '$titulo', AñoPrimeraEdicion = '$anoPrimeraEdicion', Argumento = '$argumento', Critica = '$critica', RefAutor = '$refAutor', RefEpoca = '$refEpoca', RefGenero = '$refGenero' WHERE IdObra = '$idObra'";
                        $result = mysqli_query($con, $query);
                        if (!$result) {
                            die("Query Failed.");
                        }
                        if($result){
                            echo "<script>window.open('agregarObras.php','_self')</script>";
                        }
                    }
                }
                
                ?>
        </form>
        </main>
    </div>