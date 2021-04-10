<?php
    /// altaUsuaris.php ///
    include_once "../.data/connection.php";

    if(isset($_SESSION["user"])){
        echo 'Usuario: '. $_SESSION["user"] . '
        </br><a href="index.php">Volver atras.</a></br>';
        if($_SESSION["admin"]==1){
            createForm('insertUsuari.php', true, true, true, true, true, 'Insertar');
        } else {
            echo "Usuario no autorizado";
        }
    } else {
        echo "<h3>No has iniciado session</h3>";
    }
?>