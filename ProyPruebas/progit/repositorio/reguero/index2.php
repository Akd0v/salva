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
    <link rel="stylesheet" href="../Vitrine/CSS/style.css">
</head>
<body>
<div id="agrupar">
    <header id="cabecera">

        <h1><img src="../Vitrine/fotos/images.jpg"> Minha Loja</h1>

        <ul id="menu2">
            <input type="text" id="search"  placeholder="encontre o seu produto" size="30"> &nbsp; &nbsp;
            <li><a href="#"><ins>Entre</ins></a></li>
            ou
            <li><a href="#"><ins>Cadastre-se</ins></a>&nbsp; &nbsp;</li>
            <img src="../Vitrine/fotos/compras.jpg">
            <li><a href="#"><ins>1 Item</ins></a></li>
        </ul>



    </header>
    <?php
    include_once 'includes/menu.php';
    ?>
    <section id="seccion">
        <h2><ins>Home:</ins> Smartphones<br><br></h2>
        <table>
                <tr>
                    <?php
                    $loop = 4;
                    $produto = $pdo->prepare('select * from ecommerce.produtos');
                    $produto->execute();
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
            <!--figure>
                <img src="fotos/celular.jpg">
                <figcaption>

                    <strong>Celular Galaxy S20, 4GB RAM, espaço interno 32 GB</strong>
                </figcaption>
                <br><strong>Por: R$ 500,00</strong>
                <br><br><input type="button" class="kk" value="Adicionar ao carrinho">
            </figure>
            </tr>
        </table>
        <article>
            <figure>
                <img src="fotos/celular.jpg">
                <figcaption>

                    <strong>Celular Galaxy S20, 4GB RAM, espaço interno 32 GB</strong>
                </figcaption>
                <br><strong>Por: R$ 500,00</strong>
                <br><br><input type="button" class="kk" value="Adicionar ao carrinho">
            </figure>

        </article>
        <article>
            <figure>
                <img src="fotos/celular.jpg">
                <figcaption>

                    <strong>Celular Galaxy S20, 4GB RAM, espaço interno 32 GB</strong>
                </figcaption>
                <br><strong>Por: R$ 500,00</strong>
                <br><br><input type="button" class= "kk" value="Adicionar ao carrinho">
            </figure>

        </article>
        <article>
            <figure>
                <img src="fotos/celular.jpg">
                <figcaption>

                    <strong>Celular Galaxy S20, 4GB RAM, espaço interno 32 GB</strong>
                </figcaption>
                <br><strong>Por: R$ 500,00</strong>
                <br><br><input type="button" class= "kk" value="Adicionar ao carrinho">
            </figure>

        </article-->

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
