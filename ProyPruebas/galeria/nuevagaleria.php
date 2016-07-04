<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Nueva Galeria</title>
        <style>
            label{display: block;}
            textarea{display: block;}
        </style>
    </head>
    <body>
        <form method="post" action="guardar_galeria.php">
            <label>Título</label>
            <input type="text" name="titulo">
            <label>Descripción</label>
            <textarea name="descripcion" rows="5" cols="90"></textarea>
            <input type="submit">
        </form>

    </body>
</html>