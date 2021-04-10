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
    
        $allScript = "SELECT * FROM scripts;";

        if($query = mysqli_query($db, $allScript)){
                echo '<table><thead><center><h2>Lista de scripts:</h2></center>
                <th>Nombre</th><th>Descripcion</th><th>NIF</th>
                <th>Script</th><th>Ejecutar</th>
                <th>Modificar</th><th>Eliminar</th></thead><tbody>';

                while($array = mysqli_fetch_array($query)){
                    echo "<tr>";
                    echo "<td>".$array["nom"]."</td>";
                    echo "<td>".$array["descripcio"]."</td>";
                    echo "<td>".$array["nifPropietari"]."</td>";
                    echo "<td>".$array["script"]."</td>";

                    executeScript($array);
                    modifyScript($array);
                    deleteScript($array);
                }    
                echo '</tbody></table>';
            } else {
                echo "<h3>ERROR: Al mostrar todos los usarios.</h3>";
            }  

    } else {
        echo "<h3>No has iniciado session</h3>";
    }
    
    function executeScript($array){
        echo '<td><form action="executarTasca.php" method="POST">
            <input type="hidden" name="script" value="'.$array["script"].'">
            <input type="submit" value="Execute">
        </form></td>';
    }

    function modifyScript($array){
        echo '<td><form action="modificaScript.php" method="POST">
            <input type="hidden" name="nameScript" value="'.$array["nom"].'">
            <input type="hidden" name="description" value="'.$array["descripcio"].'">
            <input type="hidden" name="script" value="'.$array["script"].'">
            <input type="hidden" name="id" value="'.$array["id"].'">
            <input type="submit" value="Modificar">
        </form></td>';
    }

    function deleteScript($array){
        echo '<td><form action="borraScript.php" method="POST">
            <input type="hidden" name="id" value="'.$array["id"].'">
            <input type="submit" value="Borrar">
        </form></td>';               
    }

?>

