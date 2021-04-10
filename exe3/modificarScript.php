<?php 
    /// modificarScript.php ///
    include_once "../.data/connection.php";

    if(isset($_SESSION["user"])){

        $nameScript = $_POST["nameScript"];
        $idScript = $_POST["id"];
        $description =$_POST["description"];
        $script = $_POST["script"];

        $sql = "UPDATE scripts SET nom='".$nameScript."', descripcio='".$description."', script='".$script."' WHERE id='".$idScript."';";
   
        if(!$query = mysqli_query($db, $sql)){
            echo "<h3>ERROR: No se ha modificado.</h3>".$sql;               
        }
        echo "<h3>Script modificado correctamente</h3>";    

    }    
    include "consultaScripts.php";
?>
