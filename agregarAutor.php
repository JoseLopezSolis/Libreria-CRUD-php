<?php
include 'db.php';
include 'page/header.php';
?>
<body>
    <div class="container-content">
        <div class="form-container">
            <form method="POST">
                <div class="form-message">
                    <h2>Añadir Autor</h2>
                </div>
                <div class="field">
                    <span><img src="./icons/username.svg" alt=""></span>
                    <input type="text" name="nomAut" id="nombre" placeholder="Nombre del autor" require>
                </div>
                <div class="field">
                    <span><img src="./icons/username.svg" alt=""></span>
                    <input type="text" name="anoNac" id="nombre" placeholder="Año de nacimiento" require>
                </div>
                <div class="field">
                    <span><img src="./icons/username.svg" alt=""></span>
                    <input type="text" name="anoFall" id="nombre" placeholder="Año de fallecimiento" require>
                </div>
                <div class="field">
                    <span><img src="./icons/username.svg" alt=""></span>
                    <input type="text" name="lugarNac" id="nombre" placeholder="Lugar de nacimiento" require>
                </div>
                <div class="field">
                    <span><img src="./icons/username.svg" alt=""></span>
                    <input type="text" name="vida" id="nombre" placeholder="Vida" require>
                </div>
                <div class="field">
                    <span><img src="./icons/username.svg" alt=""></span>
                    <input type="text" name="estilo" id="nombre" placeholder="Estilo" require>
                </div>
                <div class="field">
                    <span><img src="./icons/username.svg" alt=""></span>
                    <input type="text" name="epoca" id="nombre" placeholder="Epoca" require>
                </div>
                
                <button type="submit" name="submited" class="btn-hover color-1" id="button-submit" name="submited">
                    Añadir Autor
                </button>
                
            </form>
            <?php
            //add author
            if(isset($_POST['submited'])){
                if(isset($_POST['nomAut']) !== "" && isset($_POST['anoNac']) !== "" && isset($_POST['anoFall']) !== "" && isset($_POST['lugarNac']) !== "" && isset($_POST['vida']) !== "" && isset($_POST['estilo']) !== "" && isset($_POST['epoca']) !== ""){
                    $nomAut = $_POST['nomAut'];
                    $anoNac = $_POST['anoNac'];
                    $anoFall = $_POST['anoFall'];
                    $lugarNac = $_POST['lugarNac'];
                    $vida = $_POST['vida'];
                    $estilo = $_POST['estilo'];
                    $epoca = $_POST['epoca'];
                    $insertar = "INSERT INTO autores (Autor,AñoNacimiento,AñoFAllecimiento,LugarNacimiento,Vida,Estilo,RefEpoca) VALUES ('$nomAut', '$anoNac', '$anoFall', '$lugarNac', '$vida', '$estilo', '$epoca')";
                    $ejecutar = mysqli_query($con, $insertar);
                }
            }
        ?>
        </div>
        <?php include 'authorList.php'?>
    </div>
</body>
</html>