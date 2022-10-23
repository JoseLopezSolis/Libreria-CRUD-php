<?php
include 'db.php';
include 'page/header.php';
?>
    <main>
            <div class="main-header">
                <h2>Lista de generos</h2>
            </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Genero</th>
                <th>Accion</th>
            </tr>
                <?php
                $query = "SELECT * FROM genero";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                            <td><?php echo $row['IdGenero'] ?></td>
                            <td><?php echo $row['Genero'] ?></td>
                            <td>
                            <div class="buttons">
                                <a id="edit-user" href="editGenero.php?idGenero=<?php echo $row['IdGenero'] ?>"><img class="icons" src="./icons/edit.svg" alt=""></a>
                                <a id="delete-user" href="generoList.php?borrar=<?php echo $row['IdGenero'] ?>"> <img class="icons" src="./icons/remove.svg" alt=""></a>
                            </div>
                            </td>
                            <?php
                            if(isset($_GET['borrar'])){
                                $borrar_id = $_GET['borrar'];
                                $borrar = "DELETE FROM genero WHERE idGenero = '$borrar_id'";
                                $ejecutar = mysqli_query($con, $borrar);
                                if($ejecutar){
                                    echo "<script>window.open('agregarGenero.php', '_self')</script>";
                                }
                            }
                            ?>
                    </tr>
                <?php } ?>
                    </tr>   
        </table>
    </main>
</div>
