<?php
    include_once "../.data/connection.php";
 
    //Check if session (user) is started. If is yes show menu
    if(isset($_SESSION["user"])){
        showMenu();
    } else if($_POST["captcha"]==$_SESSION['captcha']['code']){
            $sql = "SELECT * FROM usuaris WHERE nom LIKE '".$_POST["user"]."' AND contrasenya LIKE '".md5($_POST["passwrd"])."';";
            if ($query = mysqli_query($db, $sql)) {
                $data = mysqli_fetch_array($query, MYSQLI_ASSOC);
                if($data){
                    $_SESSION["user"]   = $data["nom"];
                    $_SESSION["admin"]  = $data["admin"];
                    $_SESSION["nif"]    = $data["nif"];
                } else {
                    echo "Usuari o contraseña incorrectos.";
                    echo "<a href='index.php'>Volver atras.</a>";
                }
            }
            showMenu();
        } else {
        echo "<h3>Debes de iniciar sesion.</h3>";
        echo "<a href='index.php'>Volver atras.</a>";
    }

 
function showMenu(){
    $loginUser = $_SESSION["user"];
    $loginAdmin = $_SESSION["admin"];
    
    if($loginAdmin==1){
        echo "Usuario: ". $loginUser;
        adminMenu();
        userMenu();
    } else {
        echo "Usuario: ". $loginUser;
        userMenu();    
    }
    echo '</br><a href="sortir.php">Salir</a></br>';
}

function userMenu(){
    echo '  <h2>Menu Usuario</h2>
            <a href="consultaScripts.php">Consultar los menus Script</a></br>
            <a href="altaScript.php">Crear Script</a></br>';
}

function adminMenu(){
    echo '  <h2>Menu Administrador</h2>
            <a href="altaUsuari.php">Agregar Usuarios</a></br>
            <a href="consultarUsuaris.php">Consultar Usuarios</a>';
}

?>