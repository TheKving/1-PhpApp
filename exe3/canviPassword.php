<?php
    /// canviPassword.php ///
    include_once "../.data/connection.php";

    if($_SESSION["user"]){
        if(isset($_POST["nif"])){
            $nif = $_POST["nif"];
            $passwrd = md5($_POST["passwrd"]);
            $sql = "UPDATE usuaris SET contrasenya='".$passwrd."' WHERE nif='".$nif."';";
            if(!$query = mysqli_query($db, $sql)){
                echo "ERROR: No se ha modificado.\n ".$sql;               
            }
        } else {
            echo "<h3>ERROR al modificar la contraseña del usuario.</h3>";
        }
    } else {
        echo "<h3>No has iniciado session.</h3>";
    }
    include "consultarUsuaris.php";
?>
