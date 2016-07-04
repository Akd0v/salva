<?php
session_start();
include_once 'connect/connect.php';
if (isset($_SESSION['user'])){?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Meu Ecommerce">
        <meta name="keywords" content="HTML5, CSS3, JavaScript">
        <title>Minha Loja</title>
        <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
    <div id="agrupar">
        <header id="cabecera">

            <h1><img src="fotos/images.jpg"> Minha Loja</h1>

            <ul id="menu2">
                <input type="text" id="search"  placeholder="encontre o seu produto" size="30"> &nbsp; &nbsp;
                <li><ins><?= $_SESSION['user']?></ins></li>
                <li><a href="http://localhost:8080/login/logout.php"><ins>Salir</ins></a>&nbsp; &nbsp;</li>
                <img src="fotos/compras.jpg">
                <li><a href="#"><ins>1 Item</ins></a></li>
            </ul>
        </header>
        <?php
        include_once 'includes/menu1_login.php';
        ?>
        <section id="seccion">
            <?php
            $idCat = $_GET['idcat'];
            if (isset($idCat))
            {
                $query = $pdo->query("select * from ecommerce.categorias where idcat =$idCat");
                if ($query->rowCount()>0){
                    $row = $query->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <h2><a href="http://localhost:8080/index_login.php"><ins>Home:</ins></a>&nbsp;<?= $row['nome'];?><br><br></h2>
                    <?php
                }
            } ?>
            <table>
                <tr>
                    <?php
                    if(isset($_GET['page']))
                    {
                        $page= $_GET['page'];
                    }
                    else
                    {
                        $page=1;
                    }
                    if (isset($_GET['idcat'])){
                        $idCat=$_GET["idcat"];
                        $produto = $pdo->prepare("select * from ecommerce.produtos P where P.idcat in (select C.idcat from ecommerce.categorias C where C.idcat=? or C.pai=?) order by nome asc");
                        $produto->execute(array($idCat,$idCat));
                        include_once 'includes/pag_query_categorias.php';
                        include_once 'includes/produtos.php';
                    } else
                    {
                        $idCat=1;
                        $produto = $pdo->prepare("select * from ecommerce.produtos P where P.idcat in (select C.idcat from ecommerce.categorias C where C.idcat= ? or C.pai= ?) order by nome asc");
                        $produto->execute(array($idCat,$idCat));
                        include_once 'includes/pag_query_categorias.php';
                        include_once 'includes/produtos_login.php';
                    }
                    ?>
                </tr>
            </table>
            <?php
            include_once 'includes/pagina_categorias.php';
            ?>
            <footer id="pie">
                <br>Dereitos Reservados &copy; 2016
            </footer>
        </section>
    </div>
    </body>
    </html>

    <?php
    $pdo = null;
}else
{?>
    <script>window.location="login.php"</script>
    <?php
}
?>





