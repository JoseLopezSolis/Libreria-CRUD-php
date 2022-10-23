<?php
include 'db.php';
include 'page/header.php';
?>
<body>
    <div class="container-content">
        <div class="form-container">
            <form method="POST">
                <div class="form-message">
                    <h2>Añadir Epoca</h2>
                </div>
                <div class="field">
                    <span><img src="./icons/username.svg" alt=""></span>
                    <input type="text" name="epoca" id="nombre" placeholder="Epoca" require>
                </div>
                <div class="field">
                    <span><img src="./icons/username.svg" alt=""></span>
                    <input type="text" name="tiempoComprendido" id="nombre" placeholder="Tiempo comprendido" require>
                </div>
                <button type="submit" name="submited" class="btn-hover color-1 " id="button-submit" name="submited">
                    Añadir Autor
                </button>
                
            </form>
            <?php
            //add epoca
            if(isset($_POST['submited'])){
                if(isset($_POST['epoca']) !== "" && isset($_POST['tiempoComprendido']) !== ""){
                    $epoca = $_POST['epoca'];
                    $tiempoComprendido = $_POST['tiempoComprendido'];
                    $insertar = "INSERT INTO epocas(Epoca,TiempoComprendido) VALUES ('$epoca', '$tiempoComprendido')";
                    $ejecutar = mysqli_query($con, $insertar);
                }
            }
        ?>
        </div>
        <?php include 'epocasList.php'?>
    </div>
</body>
</html>