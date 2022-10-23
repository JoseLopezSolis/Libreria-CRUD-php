<?php
include 'db.php';
include 'page/header.php';
?>
    <main>
            <div class="main-header">
                <h2>Lista de obras</h2>
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
                <th>Accion</th>
            </tr>
                <?php
                $query = "SELECT * FROM obras";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                            <td><?php echo $row['IdObra']?></td>
                            <td><?php echo $row['Titulo']?></td>
                            <td><?php echo $row['AñoPrimeraEdicion']?></td>
                            <td><?php echo $row['Argumento']?></td>
                            <td><?php echo $row['Critica']?></td>
                            <td><?php echo $row['RefAutor']?></td>
                            <td><?php echo $row['RefEpoca']?></td>
                            <td><?php echo $row['RefGenero']?></td>
                            <td>
                            <div class="buttons">
                                <a id="edit-user" href="editObra.php?idObra=<?php echo $row['IdObra'] ?>"><img class="icons" src="./icons/edit.svg" alt=""></a>
                                <a id="delete-user" href="obrasList.php?borrar=<?php echo $row['IdObra'] ?>"> <img class="icons" src="./icons/remove.svg" alt=""></a>
                            </div>
                            </td>
                            <?php
                            if(isset($_GET['borrar'])){
                                $borrar_id = $_GET['borrar'];
                                $borrar = "DELETE FROM obras WHERE IdObra = '$borrar_id'";
                                $ejecutar = mysqli_query($con, $borrar);
                                if($ejecutar){
                                    echo "<script>window.open('agregarObras.php', '_self')</script>";
                                }
                            }
                            ?>
                    </tr>
                <?php } ?>
                    </tr>   
        </table>
    </main>
</div>
