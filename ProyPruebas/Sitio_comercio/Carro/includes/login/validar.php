<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Validar</title>
</head>
<body>
<?php
include_once '../../connect/connect.php';
if (isset($_POST['login'])) {
    $user = stripslashes($_POST['user']);
    $user = strip_tags($user);
    $password = stripcslashes($_POST['password']);
    $password = strip_tags($password);
    $password_encrypted1 = md5($password);
    $password_encrypted2 = crc32($password_encrypted1);
    $password_encrypted3 = crypt($password_encrypted2, "xtemp");
    $password_encrypted4 = sha1("xtemp".$password_encrypted3);
    $query = $pdo->prepare("select * from ecommerce.users where user = ? and password = ?");
    $query->execute(array($user, $password_encrypted4));
    if ($query->rowCount() > 0)
    {
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $row['user'];?>
        Iniciando sessão para: <?= $_SESSION['user'];?>
        <script>window.location="../../index_login.php"</script>
    <?php
    } else
    {?>
        <script>alert('Usuario ou senha incorreto')</script>
        <script>window.location="../../index.php"</script>
        <?php
    }
}
?>
</body>
</html>
<?php
$pdo = null;
?>
