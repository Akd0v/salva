<?php
include('connect/connect.php'); //Incluimos la conexion a la base de datos.
if( ($_POST["user"] == '') or ($_POST["pass"] == '') )
{
    echo "Necesitas introducir datos de logeo";
}else{
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $pass_encriptada1 = md5 ($pass); //Encriptacion nivel 1
    $pass_encriptada2 = crc32($pass_encriptada1); //Encriptacion nivel 1
    $pass_encriptada3 = crypt($pass_encriptada2, "xtemp"); //Encriptacion nivel 2
    $pass_encriptada4 = sha1("xtemp".$pass_encriptada3); //Encriptacion nivel 3
    $usuarios = mysql_query("SELECT * FROM cuentas WHERE usuarios='$user' and pass='$pass_encriptada4'");
//Comprobamos que si el usuario y la pass introducidas existan
    if($usuarios2 = mysql_fetch_array($usuarios))
    {
//Si existen los datos introducidos registraremos dos sesiones
        session_register("login");
        session_register("user");
        $_SESSION['login'] = "SI";//Le damos el valor SI a la sesion login.
        $_SESSION['user'] = $usuarios2["usuarios"];//Le damos el valor del nombre de usuario a la sesion user.
        echo '<script language="JavaScript" type="text/javascript"> 
                alert("Bienvenido.");//Mostramos alerta de bienvenida
              </script>';
        echo "<meta http-equiv='Refresh' content='2;url=index.php'>";//Redirigimos a nuestro index
    }else{
        echo 'Username y Password incorrecto.';
    }
}
?>