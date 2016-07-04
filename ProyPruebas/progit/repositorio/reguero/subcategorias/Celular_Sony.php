<?php
require_once "../connect/connect.php";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Meu Ecommerce">
    <meta name="keywords" content="HTML5, CSS3, JavaScript">
    <title>Minha Loja</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<div id="agrupar">
    <header id="cabecera">

        <h1><img src="../fotos/images.jpg"> Minha Loja</h1>

        <ul id="menu2">
            <input type="text" id="search"  placeholder="encontre o seu produto" size="30"> &nbsp; &nbsp;
            <li><a href="#"><ins>Entre</ins></a></li>
            ou
            <li><a href="#"><ins>Cadastre-se</ins></a>&nbsp; &nbsp;</li>
            <img src="../fotos/compras.jpg">
            <li><a href="#"><ins>1 Item</ins></a></li>
        </ul>
    </header>
    <nav id="menu">
        <?php
        $cats = $pdo->prepare("select * from ecommerce.categorias order by idcat asc");
        $cats->execute();
        if ($cats->rowCount() >= 1):
            echo '<ul>';
            foreach ($cats->fetchAll() as $result):
                $id = $result['idcat'];
                echo '<li>';
                echo '<a href="'.$result['url'].'"><ins>'.$result['nome'].'</ins></a>';
                $subCats = $pdo->prepare("select * from ecommerce.subcategorias where idcat=? order by idsubcat asc");
                $subCats->execute(array($id));
                if ($subCats->rowCount() >= 1):
                    echo '<ul>';
                    foreach ($subCats->fetchAll() as $result2):
                        echo '<li>';
                        echo '<a href="'.$result2['url'].'">'.$result2['nome'].'</a>';
                        echo '</li>';
                    endforeach;
                    echo '</ul>';
                endif;
                echo '</li>';
            endforeach;
            echo '</ul>';
        endif;
        ?>
    </nav>
    <section id="seccion">
        <h2><ins>Home:</ins> Smartphones<br><br></h2>
        <table>
            <tr>
                <?php
                $idSubcat = 11;
                $loop = 4;
                $produto = $pdo->prepare('select * from ecommerce.produtos where idsubcat=?');
                $produto->execute(array($idSubcat));
                $i=1;
                if ($produto->rowCount()>=1):
                    foreach ($produto->fetchAll() as $result3):
                        if ($i<$loop){
                            echo '
                                <td>
                                     
                                          <img src="'.$result3['caminho'].$result3['foto'].'">
                                            <figcaption>                        
                                                <strong>'.$result3['nome'].$result3['resumem'].'</strong>
                                            </figcaption>
                                            <br><strong>Por: R$ '.$result3['precio'].'</strong>
                                            <br><br><input type="button" class="kk" value="Adicionar ao carrinho">
                                                  
                                </td>
                            ';
                        }
                        elseif($i = $loop){
                            echo '
                                   <td>
                                         
                                              <img src="' . $result3['caminho'] . $result3['foto'] . '">
                                                <figcaption>                        
                                                    <strong>' . $result3['nome'] . $result3['resumem'] . '</strong>
                                                </figcaption>
                                                <br><strong>Por: R$ ' . $result3['precio'] . '</strong>
                                                <br><br><input type="button" class="kk" value="Adicionar ao carrinho">
                                                         
                                    </td>
                                    </tr>
                                    <tr>
                                ';
                            $i = 0;
                        }
                        $i++;
                    endforeach;
                endif;
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
