<?php
include 'db.php';
include 'page/header.php';
$idEpoca = $_GET['idEpoca'];
?>
    <main id="edit-form">
            <div class="main-header">
                <h2>Editar epoca</h2>
                <br>
                <h4>Rellena los campos para continuar</h4>
            </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Epoca</th>
                <th>Tiempo comprendido</th>
            </tr>
                <?php
                $query = "SELECT * FROM epocas WHERE idEpoca = '$idEpoca'";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <form method="POST">
                            <td><?php echo $row['IdEpoca'] ?><input type="hidden" name="idEpoca" value="<?php echo $row['IdEpoca']?>"></td>
                            <td><input type="text" name="epoca" value="<?php echo $row['Epoca'] ?>"></td>
                            <td><input type="text" name="tiempoComprendido" value="<?php echo $row['TiempoComprendido'] ?>"></td>
                            <td>
                    </tr>
                <?php } ?>
            </tr>
        </table>
                <button type="submit" name="edit" class="edit-record-button btn-hover color-1">Actualizar datos</button>
                <?php
                //edit record
                if (isset($_POST['edit'])) {
                    if (isset($_POST['epoca']) !== "" && isset($_POST['tiempoComprendido']) !== "") {
                        $idEpoca = $_POST['idEpoca'];
                        $epoca = $_POST['epoca'];
                        $tiempoComprendido = $_POST['tiempoComprendido'];
                        $query = "UPDATE epocas SET Epoca = '$epoca', TiempoComprendido = '$tiempoComprendido' WHERE idEpoca = '$idEpoca'";
                        $result = mysqli_query($con, $query);
                        if (!$result) {
                            die("Query Failed.");
                        }
                        if($result){
                            echo "<script>window.open('agregarEpoca.php','_self')</script>";
                        }
                    }
                }
                ?>
        </form>
        </main>
    </div>