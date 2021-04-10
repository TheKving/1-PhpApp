<?php 
    /// consultarUsuaris.php ///
    include_once "../.data/connection.php";
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <style>
          table, tr, td, th { border: 1px solid black; }
          table {margin:auto;}
          th{  text-align: center; }
    </style>
  </head>
  <body>
<?php

    if(isset($_SESSION["user"])){
        echo 'Usuario: '. $_SESSION["user"] . '
        </br><a href="usuari.php">Volver atras.</a></br>';
        if($_SESSION["admin"]==1){
            
            $allUsers = "SELECT * FROM usuaris;";

            if($query = mysqli_query($db, $allUsers)){
                echo '<table><thead><center><h2>Lista de usuarios:</h2></center>
                <th>Nombre Usuario</th><th>Nombre y Apellido</th><th>NIF</th>
                <th>Administrador?</th><th>Cambiar de Rol</th><th>Modificar</th>
                <th>Modificar Password</th><th>Eliminar</th></thead><tbody>';

                while($array = mysqli_fetch_array($query)){
                    echo "<tr>";
                    echo "<td>".$array["nom"]."</td>";
                    echo "<td>".$array["nomCognom"]."</td>";
                    echo "<td>".$array["nif"]."</td>";
                    echo "<td>".$array["admin"]."</td>";

                    changeRole($array);                   
                    modifyUser($array);
                    changePasswrd($array);
                    deleteUser($array);


                }    
                echo '</tbody></table>';
            } else {
                echo "<h3>ERROR: Al mostrar todos los usarios.</h3>";
            }  
        } else {
            echo "Usuario no autorizado";
        }
    } else {
        echo "<h3>No has iniciado session</h3>";
    }

    function changeRole($array){
        echo '<td><form action="canviRolUsuari.php" method="POST">
            <input type="hidden" name="admin" value="'.$array["admin"].'">
            <input type="hidden" name="nif" value="'.$array["nif"].'">
            <input type="submit" value="Cambiar Rol">
        </form></td>';
    }

    function modifyUser($array){
        echo '<td><form action="modificaUsuari.php" method="POST">
            <input type="hidden" name="name" value="'.$array["nom"].'">
            <input type="hidden" name="lname" value="'.$array["nomCognom"].'">
            <input type="hidden" name="admin" value="'.$array["admin"].'">
            <input type="hidden" name="nif" value="'.$array["nif"].'">
            <input type="submit" value="Modificar">
        </form></td>';
    }

    function changePasswrd($array){
        echo '<td><form action="canviPassword.php" method="POST">
            <input type="hidden" name="nif" value="'.$array["nif"].'">
            <input name="passwrd" type="password" >
            <input type="submit" value="Nueva Passwrd">
        </form></td>';        
    }
    function deleteUser($array){
        echo '<td><form action="borraUsuari.php" method="POST">
            <input type="hidden" name="nif" value="'.$array["nif"].'">
            <input type="submit" value="Borrar">
        </form></td>';               
    }

?>

