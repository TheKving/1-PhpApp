<?php
    /// canviRolUsuari.php ///
    include_once "../.data/connection.php";

    if($_SESSION["user"]){
        if(isset($_POST["nif"])){
            $rol = ($_POST["admin"] == '0') ? '1' : '0';
            $nif = $_POST["nif"];
            $sql = "UPDATE usuaris SET admin='".$rol."' WHERE nif='".$nif."';";
            if(!$query = mysqli_query($db, $sql)){
                echo "ERROR: No se ha modificado.\n ".$sql;               
            }
        } else {
            echo "<h3>ERROR al modificar el valor del usuario.</h3>";
        }
    } else {
        echo "<h3>No has iniciado session.</h3>";
    }
    include "consultarUsuaris.php";
?>