<?php

    if (!isset($_POST['id'])) {
        header("Location: ../");
    } else {

        require_once '../class/users.php';

        $usuarios = users::Singlenton();

        $id = $_POST['id'];
        $usuarios->delete_Users($id);
    }
?>