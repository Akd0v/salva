<?php


    if (!isset($_POST['email']))
    {
        header("Location: ../");
    }
    else
    {

        require_once '../class/users.php';
    
        $usuarios = users::Singlenton();
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $registro = date('Y-m-d');
        $usuarios->update_Users($id, $nombre, $email, $registro);
    }

?>