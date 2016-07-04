<?php
session_start();
session_destroy();
require_once "connect/connect.php";
?>
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
            <form action="index.php" method="post">
                <input type="text" id="search"  placeholder="encontre o seu produto" size="30" name="search">
                <input type="submit" class="pp" value="buscar"> &nbsp; &nbsp;
                <li><a href="http://localhost:8080/includes/login/login.php"><ins>Entre</ins></a></li>
                ou
                <li><a href="http://localhost:8080/includes/cadastro/cadastro.php"><ins>Cadastre-se</ins></a>&nbsp; &nbsp;</li>
            </form>
        </ul>
    </header>
    <?php
    include_once 'includes/menu/menu1.php';
    ?>
    <section id="seccion">
        <h2><a href="http://localhost:8080/index.php"><ins>Home</ins></a><br><br></h2>
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
                    $produto = $pdo->prepare("select * from ecommerce.produtos P where P.nome like '%$search%' or P.resumem like '%$search%' order by idproduto asc");
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
                    $prod =$pdo->query("select * from ecommerce.produtos P where P.nome like '%$search%'  or P.resumem like '%$search%' order by idproduto asc $limit");
                    if ($prod->rowCount()>0)
                    {
                        include_once 'includes/produtos/produtos.php';
                    }else
                    {
                        ?>
                        <script>
                            alert('Não há resultado da pesquisa');
                            window.location="../../index.php";
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
                    $produto = $pdo->prepare("select * from ecommerce.produtos order by idproduto asc");
                    $produto->execute();
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
                    $prod = $pdo->prepare("select * from ecommerce.produtos order by idproduto asc $limit");
                    $prod->execute();
                    include_once 'includes/produtos/produtos.php';
                    ?>
                </tr>
            </table>
            <?php
        }
        include_once 'includes/pagina/pagina_index.php';
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
?>
