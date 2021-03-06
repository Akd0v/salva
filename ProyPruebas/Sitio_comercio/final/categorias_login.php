<?php
session_start();
require_once 'class/produtos.php';
require_once 'class/categorias.php';
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

            <h1><img src="fotos/images.jpg">Loja do Julio</h1>

            <ul id="menu2">
                <form action="index_login.php" method="post">
                    <input type="text" id="search"  placeholder="encontre o seu produto" size="30" name="search">
                    <input type="submit" class="pp" value="buscar"> &nbsp; &nbsp;
                    <li><ins><?= $_SESSION['user']?></ins></li>
                    <li><a href="http://localhost:8080/includes/login/logout.php"><ins>Salir</ins></a>&nbsp; &nbsp;</li>
                    <img src="fotos/compras.jpg">
                    <li><a href="http://localhost:8080/carrinho.php"><ins>Carrinho</ins></a></li>
                </form>
            </ul>
        </header>
        <?php
        include_once 'includes/menu/menu1_login.php';
        ?>
        <section id="seccion">
            <?php
            $idCat = $_GET['idcat'];
            if (isset($idCat))
            {
                $cat = categorias::Singlenton();
                $query = $cat->getCategoriasIdCat($idCat);
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
                        $pro = produtos::Singlenton();
                        $prodCat = $pro->produtoCategorias($idCat);
                        include_once 'includes/pagina/pag_query_categorias.php';
                        include_once 'includes/produtos/produtos_login.php';
                    } else
                    {
                        $idCat=1;
                        $pro = produtos::Singlenton();
                        $prodCat = $pro->produtoCategorias($idCat);
                        include_once 'includes/pagina/pag_query_categorias.php';
                        include_once 'includes/produtos/produtos_login.php';
                    }
                    ?>
                </tr>
            </table>
            <?php
            include_once 'includes/pagina/pagina_categorias_login.php';
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
    <script>window.location="includes/login/login.php"</script>
    <?php
}
?>





