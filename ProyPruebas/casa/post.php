<?php
/**
 * Created by PhpStorm.
 * User: julio
 */
    if ($_POST["enviar"]){
        echo $_POST["nombre"];
    } else {
        ?>
        <form action="post.php" method="post">
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