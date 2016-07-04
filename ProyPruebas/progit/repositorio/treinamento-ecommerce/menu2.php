<?php
require_once ('connect/connect.php');


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
            <input type="text" id="search"  placeholder="encontre o seu produto" size="30"> &nbsp; &nbsp;
            <li><a href="#"><ins>Entre</ins></a></li>
            ou
            <li><a href="#"><ins>Cadastre-se</ins></a>&nbsp; &nbsp;</li>
            <img src="fotos/compras.jpg">
            <li><a href="#"><ins>1 Item</ins></a></li>
        </ul>



    </header>
    <nav id="menu">
        <ul id="lista">
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)):

                ?>
                <li class="<?php if($idCat==1){ echo "primer";}?>">
                    <?php
                    $idCat = $row['idcat'];
                    ?>
                    <a href="menucomsubmenu.php?idcat=<?php echo $idCat;?>"><?php echo $row['nome']; ?></a>
                    <?php
                    $subcat = $link->query('select idsubcat, subcategoria from subcategorias where idcat ='.$idCat);
                    $row2 = $subcat->fetch(PDO::FETCH_ASSOC);
                    $idSubCat = $row2['idsubcat'];
                    if ($row2 == 0){
                        echo 'erro';
                    } else{
                        ?>
                        <ul>
                            <?php
                            while ($row2){
                                ?>
                                <li>
                                    <a href="menucomsubmenu.php?subcat=<?php echo $idSubCat;?>"><?php echo $row2['subcategoria']; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </li>

            <?php endwhile ?>
            <!--li class="primer"><a href="index.php" data-hash="#index"><ins>Vitrine</ins></a></li>
            <li><a href="DVD.php" data-hash="#dvd"><ins>DVDs</ins></a></li>
            <li><a href="Livro.php" data-hash="#livro"><ins>Livros</ins></a></li>
            <li><a href="CD.php" data-hash="#cd"><ins>CDs</ins></a></li-->
        </ul>
    </nav>


</div>
</body>
</html>

<?php
$link = null;
?>
