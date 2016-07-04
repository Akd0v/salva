<?php
if ($_SESSION['login'] = "SI"){//Si la Sesion LOGIN es igual a SI (Se registro si nos logeamos bien)
    echo "Hola: ".$_SESSION['user'];
}else{//Si la Sesion LOGIN no es si (Se registro si nos logeamos bien)
    echo "Esta seccion es prohibida";
}
?>