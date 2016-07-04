<?php

require 'class/conn.php';


$dado =$_POST['nome'];

$sql = "INSERT INTO produto (nome) VALUES ('$dado')";

mysqli_query($conn, $sql);

echo mysqli_affected_rows($conn) . 'registro(s) afectado(s)';