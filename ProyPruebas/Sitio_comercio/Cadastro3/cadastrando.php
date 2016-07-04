<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
include_once 'connect/connect.php';
$user = $_POST['user'];
$nome = $_POST['nome'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$endereço = $_POST['endereço'];
$password= $_POST['password'];

$query = $pdo->prepare("insert into ecommerce.users (user, nome, apellido, email, phone, endereço, password) VALUES ('$user', '$nome', '$apellido', '$email', '$phone', '$endereço', '$password')");
$query->execute();
?>
Cadastrado
</body>
</html>

