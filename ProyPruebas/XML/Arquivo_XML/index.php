<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XML</title>
</head>
<body>
<?php
/*$ruta_arquivo = 'arquivos/usuarios.xml';
if (!$xml = simplexml_load_file($ruta_arquivo))
{?>
    No se ha podido cargar el archivo.
    <?php
}
else
{
    foreach ($xml as $usuario)
    {?>
        Nombre: <?=$usuario->nombre?><br>
        Apellido: <?=$usuario->apellido?><br>
        Dirección: <?=$usuario->direccion?><br>
        Ciudad: <?=$usuario->ciudad?><br>
        Pais: <?=$usuario->pais?><br>
        Teléfono: <?=$usuario->contacto->telefono?><br>
        Url: <?=$usuario->contacto->url?><br>
        Email: <?=$usuario->contacto->email?><br><hr>
        <?php
    }
}*/
/*$string = '<usuarios>
    <usuario>
        <nombre>Monnie</nombre>
        <apellido>Boddie</apellido>
        <direccion>Calle Pedro Mar 12</direccion>
        <ciudad>Mexicali</ciudad>
        <pais>Mexico</pais>
        <contacto>
            <telefono>44221234</telefono>
            <url>http://monnie.ejemplo.com</url>
            <email>monnie@ejemplo.com</email>
        </contacto>
    </usuario>
    <usuario>
        <nombre>Ted</nombre>
        <apellido>Gonzalez</apellido>
        <direccion>Calle Luis Angel 22</direccion>
        <ciudad>Buenos Aires</ciudad>
        <pais>Argentina</pais>
        <contacto>
            <telefono>44224664</telefono>
            <url>http://ted.ejemplo.com</url>
            <email>ted@ejemplo.com</email>
        </contacto>
    </usuario>
    </usuarios>';
// Nuevo objeto DOM
$dom = new DOMDocument;
// Cargar el string XML
$dom->loadXML($string);
$sxe = simplexml_import_dom($dom);
?>
 Ciudad: <?= $sxe->usuario[1]->ciudad;?><br>*/
/*$ruta_arquivo = 'arquivos/usuarios.xml';
$usuarios = new SimpleXMLElement($ruta_arquivo, 0, true);

foreach ($usuarios as $usuario)
{?>
    Nombre: <?=$usuario->nombre;?><br><br>
    <?php
    foreach ($usuario->contacto as $contact)
    {?>
        telf: <?=$contact->telefono;?><br><br>
        email: <?=$contact->email;?><hr>
        <?php
    }
}*/
/*$ruta_xml = "arquivos/usuarios.xml";
$usuarios = new SimpleXMLElement($ruta_xml, 0, true);
// Añadimos usuario, elementos y atributo
$nuevoUsuario = $usuarios->addChild('usuario');
$nuevoUsuario->addChild('nombre', 'Paco');
var_dump($usuarios[2]);*/

/*
* Devuelve:
* array (size=2)
  0 => string 'Ted' (length=3)
  1 => string 'Jefferson' (length=9)
*/
include "class/usuarios.php";

$user = new usuarios("arquivos/usuarios.xml");
$u23 = $user->getUserById("u23");
// Mostrar datos de un usuario?>
"El usuario <?=$u23["nombre"];$u23["apellido"];?> es de <?=$u23["pais"];?>
<?php
// Devuelve: El usuario Monnie Boddie es de Mexico
// Añadir un usuario:
$user->addUser("u44", "Jefferson", "West", "Córdoba", "Argentina", "123123", "jeff@ejemplo.com");
// Eliminar un usuario:
$user->deleteUser("u23");
// Encontrar un usuario por país
$argentinos = $user->findUserByCountry("Argentina");
var_dump($argentinos);
?>


</body>
</html>



