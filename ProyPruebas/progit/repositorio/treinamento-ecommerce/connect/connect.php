<?php


$host = 'localhost';
$user = 'root';
$pass = 'mestre';
$db_name= 'ecommerce';
$db   = 'mysql';

$pdo = new PDO("$db:$host;$db_name",$user,$pass);

//$result = $link->query('select * from categorias');

?>