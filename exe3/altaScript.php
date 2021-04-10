<?php 
    /// altaScript.php ///
    include_once "../.data/connection.php";

    if(isset($_SESSION["user"])){
        echo 'Usuario: '. $_SESSION["user"] . '
        </br><a href="usuari.php">Volver atras.</a></br>';
        createFormScript('insertScript.php', true, true, true, 'Guardar');
    } else {
        echo '<h3>No has iniciado session</h3>
        </br><a href="usuari.php">Volver atras.</a></br>';
    }
?> 