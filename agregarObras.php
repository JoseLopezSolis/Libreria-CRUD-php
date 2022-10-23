<?php
include 'db.php';
include 'page/header.php';
?>
<body>
    <div class="container-content">
        <div class="form-container">
            <form method="POST">
                <div class="form-message">
                    <h2>Añadir obras</h2>
                </div>
                <div class="field">
                    <span><img src="./icons/username.svg" alt=""></span>
                    <input type="text" name="titulo"  placeholder="Titulo" require>
                </div>
                <div class="field">
                    <span><img src="./icons/username.svg" alt=""></span>
                    <input type="text" name="primeraEdicion"  placeholder="Año primera edicion" require>
                </div>
                <div class="field">
                    <span><img src="./icons/username.svg" alt=""></span>
                    <input type="text" name="argumento" placeholder="Argumento" require>
                </div>
                <div class="field">
                    <span><img src="./icons/username.svg" alt=""></span>
                    <input type="text" name="critica" placeholder="Critica" require>
                </div>
                <div class="field">
                    <span><img src="./icons/username.svg" alt=""></span>
                    <input type="text" name="autor" placeholder="Autor" require>
                </div>
                <div class="field">
                    <span><img src="./icons/username.svg" alt=""></span>
                    <input type="text" name="epoca"  placeholder="Epoca" require>
                </div>
                <div class="field">
                    <span><img src="./icons/username.svg" alt=""></span>
                    <input type="text" name="genero"  placeholder="Genero" require>
                </div>
                <button type="submit" name="submited" class="btn-hover color-1 " id="button-submit" name="submited">
                    Añadir genero
                </button>
            </form>
            <?php
            //add obras
            if(isset($_POST['submited'])){
                if(isset($_POST['titulo']) !== "" && isset($_POST['primeraEdicion']) !== "" && isset($_POST['argumento']) !== "" && isset($_POST['critica']) !== "" && isset($_POST['autor']) !== "" && isset($_POST['epoca']) !== "" && isset($_POST['genero']) !== ""){
                    $titulo = $_POST['titulo'];
                    $primeraEdicion = $_POST['primeraEdicion'];
                    $argumento = $_POST['argumento'];
                    $critica = $_POST['critica'];
                    $autor = $_POST['autor'];
                    $epoca = $_POST['epoca'];
                    $genero = $_POST['genero'];
                    $insertar = "INSERT INTO obras(Titulo,AñoPrimeraEdicion,Argumento,Critica,RefAutor ,RefEpoca ,RefGenero ) VALUES ('$titulo', '$primeraEdicion', '$argumento', '$critica', '$autor', '$epoca', '$genero')";
                    $ejecutar = mysqli_query($con, $insertar);
                }
            }
        ?>
        </div>
        <?php include 'obrasList.php'?>
    </div>
</body>
</html>