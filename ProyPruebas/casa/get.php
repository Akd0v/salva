<?php
    if ($_GET["enviar"]){
        echo $_GET["nombre"];
    } else{
        ?>
        <form action="get.php" method="get">
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