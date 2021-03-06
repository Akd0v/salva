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
        <?php
        $idCat = $_GET['idcat'];
        if (isset($idCat))
        {
            $query = $pdo->query("select * from ecommerce.categorias where idcat =$idCat");
            if ($query->rowCount()>0){
                $row = $query->fetch(PDO::FETCH_ASSOC);
                ?>
                <h2><a href="http://localhost:8080/index.php"><ins>Home:</ins></a>&nbsp;<?= $row['nome'];?><br><br></h2>
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
                    include_once 'includes/pagina/pag_query_categorias.php';
                    include_once 'includes/produtos/produtos.php';
                } else
                {
                    $idCat=1;
                    $produto = $pdo->prepare("select * from ecommerce.produtos P where P.idcat in (select C.idcat from ecommerce.categorias C where C.idcat= ? or C.pai= ?) order by nome asc");
                    $produto->execute(array($idCat,$idCat));
                    include_once 'includes/pagina/pag_query_categorias.php';
                    include_once 'includes/produtos/produtos.php';
                }
                ?>
            </tr>
        </table>
        <?php
        include_once 'includes/pagina/pagina_categorias.php';
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
