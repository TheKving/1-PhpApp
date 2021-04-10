<?php
    include_once "../.data/connection.php";

    $user       = $_POST["name"];
    $lastName   = $_POST["lastName"];
    $nif        = $_POST["nif"];
    $passwrd    = md5($_POST["passwrd"]);
    $admin      = (isset($_POST["admin"])) ? '1' : '0';

    
    if(isset($_SESSION["user"])){
        if($_SESSION["admin"]==1){
            echo $_SESSION["user"];
            //Call function insertUser
            insertUser($db,$user, $lastName, $nif, $passwrd, $admin);
        } else {
            echo "<h2>ERROR: No eres administrador</h2>
            <a href='index.php'>Volver atras.</a>";
        }
    } else {
        echo "<h1>ERROR: Debes de estar conectado</h1>
            <a href='index.php'>Volver atras.</a>";
    }
    
    function insertUser($db, $name, $lname, $nif, $passwrd, $admin){
        //Check If User Exist
        $userExist = "SELECT * FROM usuaris WHERE nom='".$name."';";
        $addUser = "INSERT INTO usuaris(nom, nomCognom, nif, contrasenya, admin)
                    VALUES('". $name."','". $lname."','". $nif. "','". $passwrd. "','".$admin. "');";
        $query = mysqli_query($db, $userExist);

        if((mysqli_num_rows($query) == 0)){
            if($query = mysqli_query($db, $addUser)){
                echo "<h3>Usuario añadido correctamente</h3>
                    <a href='usuari.php'>Volver al menu</a>";               
            } else {
                echo "<h3>ERROR: Al insertar el usuario.</h3>";
            }         
        } else {
            echo "<h3>El usuario ".$name." ya existe.</h3>";
        }
    }

?>
