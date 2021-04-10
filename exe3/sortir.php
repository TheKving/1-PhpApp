<?php
    /// borrarUsuari.php ///
    include_once "../.data/connection.php";

    if($_SESSION["user"]){
        $user = $_SESSION["user"];
        mysqli_close($db);
        session_destroy();
        echo "<h3>Hasta pronto ".$user."<h3></br>
            <a href='index.php'>Volver</a>";
    } else {
        echo "<h3>No has iniciado session.</h3>";
    }
?>


