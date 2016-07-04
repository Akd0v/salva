<?php

    if (!isset($_POST['email']))
    {
        header("Location: ../");
    }
    else
    {

        require_once '../class/users.php';

        $usuarios = users::Singlenton();

        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $registro = date('Y-m-d');
        $usuarios->insert_Users($nombre, $email, $registro);
    }
?>