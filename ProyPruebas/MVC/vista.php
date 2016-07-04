<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Modelo-vista-controlador</title>
</head>
<body>
<h1>Platillos disponibles</h1>
<table border="1">
    <tr>
        <td><strong>Nombre platillo</strong></td>
        <td><strong>Precio platillo</strong></td>
    </tr>
    <?php
    for($i=0;$i<count($pd);$i++)
    {
        ?>
        <tr>
            <td><?php echo $pd[$i]["nombre"]; ?></td>
            <td><?php echo $pd[$i]["precio"]; ?> USD.</td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>