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
include_once '../connect/connect.php';
if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
    $query = $pdo->prepare("select * from ecommerce.users where user = ? and password = ?");
    $query->execute(array($user, $password));
    if ($query->rowCount() > 0)
    {
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $row['user'];?>
        Iniciando sessão para: <?= $_SESSION['user'];?>
        <script>window.location="../index_login.php"</script>
    <?php
    } else
    {?>
        <script>alert('Usuario ou senha incorreto')</script>
        <script>window.location="../../../index.php"</script>
        <?php
    }
}
?>
</body>
</html>
