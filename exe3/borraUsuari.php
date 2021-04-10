<?php
    /// borrarUsuari.php ///
    include_once "../.data/connection.php";

    if($_SESSION["user"]){
        if(isset($_POST["nif"])){
            $nif = $_POST["nif"];
            $sql = "DELETE FROM usuaris WHERE nif='".$nif."';";
            if(!$query = mysqli_query($db, $sql)){
                echo "ERROR: No se ha eliminado el usuario.\n ".$sql;               
            }
        } else {
            echo "<h3>ERROR al eliminar el usuario.</h3>";
        }
    } else {
        echo "<h3>No has iniciado session.</h3>";
    }
    include "consultarUsuaris.php";
?>

