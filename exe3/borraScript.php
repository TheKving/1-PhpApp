<?php
    /// borrarScript.php ///
    include_once "../.data/connection.php";

    if($_SESSION["user"]){
        if(isset($_POST["id"])){
            $id = $_POST["id"];
            $sql = "DELETE FROM scripts WHERE id='".$id."';";
            if(!$query = mysqli_query($db, $sql)){
                echo "ERROR: No se ha eliminado el usuario.\n ".$sql;               
            }
        } else {
            echo "<h3>ERROR al eliminar el script.</h3>";
        }
    } else {
        echo "<h3>No has iniciado session.</h3>";
    }
    include "consultaScripts.php";
?>
