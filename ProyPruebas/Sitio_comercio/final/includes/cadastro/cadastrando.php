<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
require_once '../../class/users.php';
$user = stripslashes($_POST['user']);
$user = strip_tags($user);
$nome = stripcslashes($_POST['nome']);
$nome = strip_tags($nome);
$apellido = stripcslashes($_POST['apellido']);
$apellido = strip_tags($apellido);
$email = stripcslashes($_POST['email']);
$email = strip_tags($email);
$endereço = stripcslashes($_POST['endereço']);
$endereço = strip_tags($endereço);
$password1 = stripcslashes($_POST['password1']);
$password1 = strip_tags($password1);
$password2 = stripcslashes($_POST['password2']);
$password2 = strip_tags($password2);
if (strlen($password1)>5) {
    if ($password1 != $password2) {
        ?>
        <script>alert('As senhas não correspondem')</script>
        <script>window.location = "cadastro.php"</script>
    <?php
    }else
    {
        $password_encrypted1 = md5($password1);
        $password_encrypted2 = crc32($password_encrypted1);
        $password_encrypted3 = crypt($password_encrypted2, "xtemp");
        $password_encrypted4 = sha1("xtemp" . $password_encrypted3);

        $us = users::Singlenton();
        $users = $us->getUsers($user);

        if ($users->rowCount() > 0)
        {
        ?>
            <script>alert('O usuário: <?= $user ?> já existe, digite outro nome de usuário.')</script>
            <script>window.location = "cadastro.php"</script>
        <?php
        }else
        {
            $usuario = $us->insert_Users($user, $nome, $apellido, $email, $endereço, $password_encrypted4);
        ?>
            Cadastrado com êxito. <?php
            $_SESSION['user'] = $user; ?>
            Iniciando sessão para: <?= $_SESSION['user']; ?>
            <script>window.location = "../../index_login.php"</script>
        <?php
        }
    }
}else
{?>
    <script>alert('Para uma senha correta você tem que escrever mais de 5 caracteres.')</script>
    <script>window.location = "cadastro.php"</script>
    <?php
}?>
</body>
</html>
<?php
$pdo = null;
?>
