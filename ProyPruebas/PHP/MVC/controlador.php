<?php
require_once("modelo.php");
$menu = new Platillo();
$pd = $menu->lista_platillos();
require_once("vista.php");
?>