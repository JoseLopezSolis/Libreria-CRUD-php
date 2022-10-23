<?php
include 'db.php';
include 'page/header.php';
?>
<body>
    <div class="container-content">
        <div class="form-container">
            <form method="POST">
                <div class="form-message">
                    <h2>Añadir Genero</h2>
                </div>
                <div class="field">
                    <span><img src="./icons/username.svg" alt=""></span>
                    <input type="text" name="genero" id="nombre" placeholder="Genero" require>
                </div>
                <button type="submit" name="submited" class="btn-hover color-1 " id="button-submit" name="submited">
                    Añadir genero
                </button>
            </form>
            <?php
            //add epoca
            if(isset($_POST['submited'])){
                if(isset($_POST['genero']) !== ""){
                    $genero = $_POST['genero'];
                    $insertar = "INSERT INTO genero(Genero) VALUES ('$genero')";
                    $ejecutar = mysqli_query($con, $insertar);
                }
            }
        ?>
        </div>
        <?php include 'generoList.php'?>
    </div>
</body>
</html>