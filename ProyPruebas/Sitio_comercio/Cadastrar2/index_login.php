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
            <h2><a href="http://localhost:8080/index_login.php"><ins>Home</ins></a><br><br></h2>
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
                    $produto = $pdo->prepare("select * from ecommerce.produtos order by idproduto asc");
                    $produto->execute();
                    $loop = 4;
                    $i=1;
                    $num_rows = $produto->rowCount();
                    $rows_per_page= 8;
                    $lastpage= ceil($num_rows / $rows_per_page);
                    $page=(int)$page;
                    if($page > $lastpage){
                        $page= $lastpage;
                    }
                    if($page < 1)
                    {
                        $page=1;
                    }
                    $limit= 'LIMIT '. ($page -1) * $rows_per_page . ',' .$rows_per_page;
                    $prod =$pdo->prepare("select * from ecommerce.produtos order by idproduto asc $limit");
                    $prod->execute();
                    include_once 'includes/produtos_login.php';
                    ?>
                </tr>
            </table>
            <?php
            include_once 'includes/pagina_index.php';
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
    <script>window.location="login/login.php"</script>
    <?php
}
?>

