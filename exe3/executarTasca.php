<?php 
    /// executarTasca.php ///
    include_once "../.data/connection.php";

    if(isset($_SESSION["user"])){

        $script = $_POST["script"];
        include "consultaScripts.php";
     
        $exec = shell_exec($script);
        echo '<div style="margin:auto; font-family: arial; color: white; background-color: black; border-radius: 10px;">
        <pre style="padding: 15px;">'.$exec.'</pre><div>';
    }
?>
