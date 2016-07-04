<?php

    require 'Figura.php';
    require 'Cuadrado.php';
    require 'Triangulo.php';

   //asignación de variables
    $cuadrado = new Cuadrado(4, 3);
    $triangulo = new Triangulo(3, 6);

    //calculo de perimetro
    echo $cuadrado->perimetro();
    echo "<br/>";
    echo $triangulo->perimetro();