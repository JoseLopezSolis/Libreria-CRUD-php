<?php
include 'db.php';
include 'page/header.php';
?>
    <main>
            <div class="main-header">
                <h2>Lista de epocas</h2>
            </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Epoca</th>
                <th>Tiempo comprendido</th>
                <th>Accion</th>
            </tr>
                <?php
                $query = "SELECT * FROM epocas";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                            <td><?php echo $row['IdEpoca'] ?></td>
                            <td><?php echo $row['Epoca'] ?></td>
                            <td><?php echo $row['TiempoComprendido'] ?></td>
                            <td>
                            <div class="buttons">
                                <a id="edit-user" href="editEpoca.php?idEpoca=<?php echo $row['IdEpoca'] ?>"><img class="icons" src="./icons/edit.svg" alt=""></a>
                                <a id="delete-user" href="epocasList.php?borrar=<?php echo $row['IdEpoca'] ?>"> <img class="icons" src="./icons/remove.svg" alt=""></a>
                            </div>
                            </td>
                            <?php
                            if(isset($_GET['borrar'])){
                                $borrar_id = $_GET['borrar'];
                                $borrar = "DELETE FROM epocas WHERE idEpoca = '$borrar_id'";
                                $ejecutar = mysqli_query($con, $borrar);
                                if($ejecutar){
                                    echo "<script>window.open('agregarEpoca.php', '_self')</script>";
                                }
                            }
                            ?>
                    </tr>
                <?php } ?>
                    </tr>   
        </table>
    </main>
</div>
