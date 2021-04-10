<?php 
    /// insertScript.php ///
    include_once "../.data/connection.php";

    if(isset($_SESSION["user"])){
    
        $nScript = $_POST["nameScript"];
        $desc = $_POST["description"];
        $script = $_POST["script"];
        $nif = $_SESSION["nif"];

        $addScript = "INSERT INTO scripts(nom, descripcio, nifPropietari, script)
        VALUES('". $nScript."','". $desc."','". $nif. "','". $script. "');";

        if(!$query = mysqli_query($db, $addScript)){
            echo "ERROR: Al insertar Script.\n ".$addScript;               
        }
        echo 'Usuario: '. $_SESSION["user"] . '
        </br><a href="usuari.php">Volver atras.</a></br>
        <h3>Script insertado correctamente</h3>';
    }
?>
