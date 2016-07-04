<?php
    require_once "connect/connect.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Meu Ecommerce">
        <meta name="keywords" content="HTML5, CSS3, JavaScript">
        <title>Minha Loja</title>
        <link rel="stylesheet" href="CSS/style3.css">
    </head>
    <body>
        <div id="agrupar">
            <header id="cabecera">

                <h1><img src="fotos/images.jpg"> Minha Loja</h1>

                <ul id="menu2">
                    <input type="text" id="search"  placeholder="encontre o seu produto" size="30"> &nbsp; &nbsp;
                    <li><a href="#"><ins>Entre</ins></a></li>
                    ou
                    <li><a href="#"><ins>Cadastre-se</ins></a>&nbsp; &nbsp;</li>
                    <img src="fotos/compras.jpg">
                    <li><a href="#"><ins>1 Item</ins></a></li>
                </ul>
            </header>
            <?php
            include_once 'includes/menu1.php';
            ?>
            <section id="seccion">
                <h2><ins>Home:</ins> Smartphones<br><br></h2>
                <table>
                    <tr>
                        <?php
                        $produto = $pdo->prepare('select * from ecommerce.produtos');
                        $produto->execute();
                        include_once 'includes/produtos.php';
                        ?>
                    </tr>
                </table>
                <footer id="pie">
                    <br>Dereitos Reservados &copy; 2016
                </footer>
            </section>
        </div>
    </body>
</html>

<?php
$pdo = null;
?>
