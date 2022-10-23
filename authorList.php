<?php
include 'db.php';
include 'page/header.php';
?>
    <main>
            <div class="main-header">
                <h2>Lista de autores</h2>
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
                <th>Accion</th>
            </tr>
                <?php
                $query = "SELECT * FROM autores";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                            <td><?php echo $row['idAutor'] ?></td>
                            <td><?php echo $row['Autor'] ?></td>
                            <td><?php echo $row['AñoNacimiento'] ?></td>
                            <td><?php echo $row['AñoFallecimiento'] ?></td>
                            <td><?php echo $row['LugarNacimiento'] ?></td>
                            <td><?php echo $row['Vida'] ?></td>
                            <td><?php echo $row['Estilo'] ?></td>
                            <td><?php echo $row['RefEpoca'] ?></td>
                            <td>
                            <div class="buttons">
                                <a id="edit-user" href="editAutor.php?idAutor=<?php echo $row['idAutor'];?>"><img class="icons" src="./icons/edit.svg" alt=""></a>
                                <a id="delete-user" href="authorList.php?borrar=<?php echo $row['idAutor'] ?>"> <img class="icons" src="./icons/remove.svg" alt=""></a>
                            </div>
                            </td>
                            <?php
                            if(isset($_GET['borrar'])){
                                $borrar_id = $_GET['borrar'];
                                $borrar = "DELETE FROM autores WHERE idAutor = '$borrar_id'";
                                $ejecutar = mysqli_query($con, $borrar);
                                if($ejecutar){
                                    echo "<script>window.open('agregarAutor.php', '_self')</script>";
                                }
                            }
                            ?>
                    </tr>
                <?php } ?>
                    </tr>
        </table>
        </main>
    </div>