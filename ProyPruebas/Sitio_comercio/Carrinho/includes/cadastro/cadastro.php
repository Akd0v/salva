<?php
session_start();
include_once '../../connect/connect.php';
if (isset($_SESSION['user'])){?>
    <script>window.location="../../index_login.php";</script>
    <?php
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Cadastro</title>
    <link rel="stylesheet" href="../../CSS/style.css">
</head>
<body>
    <nav id="seccioncadastro">
        <h3><a href="../../index.php"><img src="../../fotos/flecha.jpg" align="left"></a>Cadastro</h3><br>
        <form id="cadastro" method="post" action="cadastrando.php">
            <label id="dados">Usuário</label><br>
            <input type="text" class="control" name="user" autocomplete="on" required><br><br>
            <label id="dados">Nome</label><br>
            <input type="text" class="control" name="nome" autocomplete="on"><br><br>
            <label id="dados">Apellido</label><br>
            <input type="text" class="control" name="apellido" autocomplete="on"><br><br>
            <label id="dados">E-mail</label><br>
            <input type="email" class="control" name="email" autocomplete="on" required><br><br>
            <label id="dados">Endereço</label><br>
            <input type="text" class="control" name="endereço" autocomplete="on" required><br><br>
            <label id="dados">Senha</label><br>
            <input type="password" class="control" name="password1" autocomplete="off" required><br><br>
            <label id="dados">Repetir senha</label><br>
            <input type="password" class="control" name="password2" autocomplete="off" required><br><br>
            <input type="submit" class="kk" value="Cadastrar">
        </form>
    </nav>
</body>
</html>