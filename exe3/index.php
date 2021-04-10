<?php
  session_start();
  require_once("../captcha/simple-php-captcha.php");
  $_SESSION['captcha'] = simple_php_captcha();
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Exercici 1 - Login</title>
    <style>
    *{box-sizing:border-box;}
    form { 
        margin: auto;   
        border-radius:10px;
        width: 43%;
        padding: 16px;
        background-color:#ccc;
    }
    .middle {
        margin:0px auto; 
        display:block;
        text-align: center;
    } 
    </style>
  </head>
  <body>
<?php


  function formHTML(){
        echo '
            <form action="usuari.php" target="" method="POST" name="formLogin">
            <table>
            <img class="middle" src='. $_SESSION['captcha']['image_src'] .'
             
            <tr>
            <td><label for="captcha">Captcha:</label> </td>
            <td><input type="text" id="captcha" name="captcha"/> </td>           
            </tr>

            <tr>
            <td><label for="user">Usuario:</label></td>
            <td><input type="text" id="user" name="user"/></td>
            </tr>

            <tr>        
            <td><label for="passwrd">Contraseña:</label></td>
            <td><input type="password" id="passwrd" name="passwrd"/></td>
            </tr>
            
            <tr><td class="middle"><input id="sumbit" type="submit" value="Entrar"></td></tr>

            </table>
            </form>
            ';        
    }
  
  formHTML();
?>
</body>
</html>