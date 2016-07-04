<?php

$link = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', 'mestre');

$result = $link->query('SELECT idcat, nome FROM categorias');
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
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <li class=$nome>
                    <a href="/<?php
                    if($row['idcat']==2){
                        echo 'CD.php';
                    }
                    elseif($row['idcat']==3){
                        echo 'DVD.php';
                    }
                    elseif($row['idcat']==4){
                        echo 'Livro.php';
                    }
                    else {
                        echo 'index.php';
                        $nome ="primer";
                    }
                    ?>">
                        <?php echo $row['nome'] ?>
                    </a>
                </li>

            <?php endwhile ?>
            <!--li class="primer"><a href="index.php" data-hash="#index"><ins>Vitrine</ins></a></li>
            <li><a href="DVD.php" data-hash="#dvd"><ins>DVDs</ins></a></li>
            <li><a href="Livro.php" data-hash="#livro"><ins>Livros</ins></a></li>
            <li><a href="CD.php" data-hash="#cd"><ins>CDs</ins></a></li-->
        </ul>
    </nav>
    <section id="seccion">

        <h2><ins>Home:</ins> CDs<br><br></h2>

        <article>

            <figure>
                <img src="fotos/cds.jpg">
                <figcaption>
                    <!--Esta es la imagen del primer mensaje-->
                    <strong>303 cursos de Programação/Informática. Tutoriales.</strong>
                </figcaption>
                <br><strong>Por: R$ 150,00</strong>
                <br><br><input type="button" class="kk" value="Adicionar ao carrinho">
            </figure>

        </article>
        <article>
            <figure>
                <img src="fotos/cds.jpg">
                <figcaption>
                    <!--Esta es la imagen del primer mensaje-->
                    <strong>303 cursos de Programação/Informática. Tutoriales.</strong>
                </figcaption>
                <br><strong>Por: R$ 150,00</strong>
                <br><br><input type="button" class="kk" value="Adicionar ao carrinho">
            </figure>

        </article>
        <article>
            <figure>
                <img src="fotos/cds.jpg">
                <figcaption>
                    <!--Esta es la imagen del primer mensaje-->
                    <strong>303 cursos de Programação/Informática. Tutoriales.</strong>
                </figcaption>
                <br><strong>Por: R$ 150,00</strong>
                <br><br><input type="button" class="kk" value="Adicionar ao carrinho">
            </figure>

        </article>
        <article>
            <figure>
                <img src="fotos/cds.jpg">
                <figcaption>
                    <!--Esta es la imagen del primer mensaje-->
                    <strong>303 cursos de Programação/Informática. Tutoriales.</strong>
                </figcaption>
                <br><strong>Por: R$ 150,00</strong>
                <br><br><input type="button" class="kk" value="Adicionar ao carrinho">
            </figure>

        </article>

        <footer id="pie">
            <br>Dereitos Reservados &copy; 2016
        </footer>
    </section>
</div>
</body>
</html>

<?php
$link = null;
?>