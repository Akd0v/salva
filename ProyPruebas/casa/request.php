<?php

/**
 * Created by PhpStorm.
 * User: yulaimy
 * Date: 10-04-2016
 * Time: 07:39 AM
 */
    if ($_REQUEST["enviar"]){
        echo $_REQUEST["nombre"];
    } else {
        ?>
        <form action="request.php" method="get">
            <p>
                Escribe tu nombre: <input name="nombre" type="text"/>
            </p>
            <p>
                <input name="enviar" value="Enviar datos" type="submit"/>
            </p>
        </form>
        <?php
    }
?>