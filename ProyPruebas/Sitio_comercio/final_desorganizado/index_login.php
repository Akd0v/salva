<?php
session_start();
include_once 'class/categorias.php';
include_once 'class/produtos.php';
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
            <h2><a href="http://localhost:8080/index_login.php"><ins>Home</ins></a><br><br></h2>
            <?php
            if (isset($_POST['search']))
            {
                $search = $_POST['search'];
                ?>
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
                        $pro = produtos::Singlenton();
                        $prodsearch = $pro->buscar($search);
                        $loop = 4;
                        $i=1;
                        $num_rows = $prodsearch->rowCount();
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
                        $prod = $pro->buscar2($search,$limit);
                        if ($prod->rowCount()>0)
                        {
                            include_once 'includes/produtos/produtos_login.php';
                        }else
                        {
                            ?>
                            <script>
                                alert('Não há resultado da pesquisa');
                                window.location="index_login.php";
                            </script>
                            <?php
                        }
                        ?>
                    </tr>
                </table>
                <?php
            } else
            {
                ?>
                <table>
                    <tr>
                        <?php
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }
                        $pro = produtos::Singlenton();
                        $produto = $pro->getProdutos();
                        $loop = 4;
                        $i = 1;
                        $num_rows = $produto->rowCount();
                        $rows_per_page = 8;
                        $lastpage = ceil($num_rows / $rows_per_page);
                        $page = (int)$page;
                        if ($page > $lastpage) {
                            $page = $lastpage;
                        }
                        if ($page < 1) {
                            $page = 1;
                        }
                        $limit = 'LIMIT ' . ($page - 1) * $rows_per_page . ',' . $rows_per_page;
                        $prod = $pro->getProdutos2($limit);                       
                        $prod->execute();
                        include_once 'includes/produtos/produtos_login.php';
                        ?>
                    </tr>
                </table>
                <?php
            }
            include_once 'includes/pagina/pagina_index_login.php';
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

