<?php

/*1) Crea un array o arreglo unidimensional con un tamaño de 5,
asignale los valores numéricos manualmente (los que tu quieras) y
muestralos por pantalla.
//Declaramos variables
    Definir num como entero;
    Definir TAMANIO como entero;
    TAMANIO<-5
    //Definimos el array
    Dimension num[TAMANIO]

    //Asignamos valores
    num[1]<-1
    num[2]<-2
    num[3]<-3
    num[4]<-4
    num[5]<-5

    //Recorremos el array y mostramos su contenido
    Para i<-1 Hasta TAMANIO Con Paso 1 Hacer
        escribir num[i]
    Fin Para

FinProceso*/


$tamanho = 5;

$num[1] = 1;
$num[2] = 2;
$num[3] = 3;
$num[4] = 4;
$num[5] = 5;
?>
    <table>
        <tr>
            <?php
            for ($j=1; $j <= $tamanho; $j++)
                
            ?>
            <?php
            for ($i = 1; $i <= count($num); $i++){
                ?>
                <td>
                    <?=$num[$i];?>
                </td>
                <?php
            } ?>
        </tr>
    </table>
<?php



