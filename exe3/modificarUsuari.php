<?php 
    /// modificarUsuari.php ///
    include_once "../.data/connection.php";

    if(isset($_SESSION["user"])){
        if($_SESSION["admin"]==1){
            $hiddenNif = $_POST["hiddenNif"];
            $name = $_POST["name"];
            $lastName = $_POST["lastName"];
            $nif = $_POST["nif"];
            $admin = (isset($_POST["admin"])) ? '1' : '0';

            $sql = "UPDATE usuaris SET nom='".$name."', nomCognom='".$lastName."', nif='".$nif."', admin='".$admin."' WHERE nif='".$hiddenNif."';";
       
            if(!$query = mysqli_query($db, $sql)){
                echo "ERROR: No se ha modificado.\n ".$sql;               
            }
            //echo $sql;
        } else {
            echo "<h3>No has iniciado session</h3>";
        }
    }    
    include "consultarUsuaris.php";
?>
