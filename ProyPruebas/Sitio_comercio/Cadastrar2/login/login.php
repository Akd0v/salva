<?php
session_start();
include_once '../connect/connect.php';
if (isset($_SESSION['user'])){?>
    <script>window.location="../index_login.php";</script>    
<?php
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastre-se</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<nav id="seccionlogin">
    <h3>Cadastro</h3><br>
    <form action="validar.php" method="post">
        <label id="dados">Informe seu nome</label><br>
        <input type="text" class="control" name="user" autocomplete="off" required><br><br>
        <label id="dados">Informe sua senha</label><br>
        <input type="password" class="control" name="password" autocomplete="off" required><br><br>
        <input type="submit" class="kk"  required name="login" value="Continuar">
    </form>
</nav>
</body>
</html>
