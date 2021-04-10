<?php 
    /// modificaScript.php ///
    include_once "../.data/connection.php";

    if(isset($_SESSION["user"])){
        echo 'Usuario: '. $_SESSION["user"] . '
        </br><a href="usuari.php">Volver atras.</a></br>';

        if(isset($_POST["id"])){
            $postValue = array(
            "nameScript" => $_POST["nameScript"],
            "id" => $_POST["id"],
            "description" => $_POST["description"],
            "script" => $_POST["script"],
            );
            createFormScript('modificarScript.php', true, true, true, 'Guardar', $postValue);
        }           
    } else {
        echo "<h3>No has iniciado session</h3>";
    }


?> 

