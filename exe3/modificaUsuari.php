<?php 
    /// modificaUsuaris.php ///
    include_once "../.data/connection.php";

    if(isset($_SESSION["user"])){
        echo 'Usuario: '. $_SESSION["user"] . '
        </br><a href="usuari.php">Volver atras.</a></br>';
        if($_SESSION["admin"]==1){
            //echo = $_POST["name"];
            if(isset($_POST["nif"])){
                $postValue = array(
                    "nom" => $_POST["name"],
                    "nomCognom" => $_POST["lname"],
                    "nif" => $_POST["nif"],
                    "passwrd" => "",
                    "admin" => ($_POST["admin"] == '1') ? 'checked' : '0',
                  );
                createForm('modificarUsuari.php', true, true, true, false, true, 'Modificar', $postValue);
            }
            
        } else {
            echo "<h3>Usuario no autorizado.</h3>";
        }
    } else {
        echo "<h3>No has iniciado session</h3>";
    }


?> 