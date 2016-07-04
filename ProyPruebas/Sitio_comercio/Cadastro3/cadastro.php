<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Cadastro</title>
</head>
<body>
    <div>
        <article>
            <form method="post" action="cadastrando.php">
                Usuário: <input type="text" name="user" autocomplete="on" required><br><br>
                Nome: <input type="text" name="nome" autocomplete="on"><br><br>
                Apellido: <input type="text" name="apellido" autocomplete="on"><br><br>
                E-mail: <input type="email" name="email" autocomplete="on" required><br><br>
                Endereço: <input type="text" name="endereço" autocomplete="on" required><br><br>
                Phone: <input type="tel" name="phone" autocomplete="on"><br><br>
                Senha: <input type="password" name="password" autocomplete="off" required><br><br>
                <input type="submit" value="Cadastrar">
            </form>
        </article>
    </div>
</body>
</html>