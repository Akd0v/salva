<?php
include('connect/connect.php');//Incluimos la conexion a la base de datos.
if (($_POST['user']== '') or ($_POST['passwd']== '') or ($_POST['passwd2']== '')){
    echo "Te faltaron rellenar campos";
}else{
    if($_POST['passwd'] != $_POST['passwd2']){
        echo "Las contrasenas no coinciden";
    }else{
        $user = stripslashes($_POST["user"]);
        $user = strip_tags($user);
// Quitamos las etiquetas html y lo relacionado a el usuario.
        $pass = stripslashes($_POST["passwd"]);
        $pass = strip_tags($pass);
// Quitamos las etiquetas html y lo relacionado a el password.
        /* _____________________________________ */
// Comenzamos con la encriptacion a el estilo de Xt3mP.
        $pass_encriptada1 = md5 ($pass); //Encriptacion nivel 1
        $pass_encriptada2 = crc32($pass_encriptada1); //Encriptacion nivel 1
        $pass_encriptada3 = crypt($pass_encriptada2, "xtemp"); //Encriptacion nivel 2
        $pass_encriptada4 = sha1("xtemp".$pass_encriptada3); //Encriptacion nivel 3
// Aqui será demasiado dificil poder llegar a la password verdadera ya que por ejemplo, podrian desencriptar el md5 pero aún faltaria demasiado.
        $usuarios = mysql_query("SELECT usuarios FROM cuentas WHERE usuarios='$user' ");
// Seleccionamos el campo usuarios de la tabla cuentas en donde el usuario es el que escriben en el campo user
        if($usuarios2 = mysql_fetch_array($usuarios))
        {
            echo 'El usuario '.$user.' ya esta registrado';
            mysql_free_result($usuarios);
// Liberamos la memoria
        }else{
            mysql_query("INSERT INTO cuentas (usuarios,pass) values ('$user','$pass')");
//Insertamos los valores de el user y pass en los campos usuarios y pass de la tabla cuentas
            echo "El usuario '.$user.' ha sido registrado con éxito.";
//Decimos que el usuario ha sido registrado, etc.
}
}
}
?>