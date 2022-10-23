<?php
include 'db.php';
include 'page/header.php';
?>
<header>
    <h1>Biblioteca web app</h1>
</header>


<div class="nav-bar-container">
    <div class="menu-container">
        <span>Menu</span>
        <div class="message-guide">
    <h3>Seleccione una opcion</h3>
</div>
        <nav>
            <ul>
                <li><a href="./agregarAutor.php"><button  name="submited" class="btn-hover color-2" id="button-submit" name="submited">
                    Añadir autor
                </button></a></li>
                <li><a href="./agregarEpoca.php"><button name="submited" class="btn-hover color-2" id="button-submit" name="submited">
                    Añadir epoca
                </button></a></li>
                <li><a href="./agregarGenero.php"><button  name="submited" class="btn-hover color-2" id="button-submit" name="submited">
                    Añadir genero
                </button></a></li>
                <li><a href="./agregarObras.php"><button  name="submited" class="btn-hover color-2" id="button-submit" name="submited">
                    Añadir obras
                </button></a></li>
            </ul>
        </nav>
    </div>
</div>