<?php
require_once "connect/connect.php";
?>
<link rel="stylesheet" href="CSS/style.css">
<nav id="menu">
    <?php
    $cats = $pdo->prepare("select * from ecommerce.categorias order by idcat asc");
    $cats->execute();
    if ($cats->rowCount() >= 1):
        echo '<ul>';
        foreach ($cats->fetchAll() as $result):
            $id = $result['idcat'];
            echo '<li>';
            //echo '<a href="'.$result['url'].'?idcat=' . $result['idcat'] . '"><ins>'.$result['nome'].'</ins></a>';
            ?>
            <a href="http://localhost:8080/categorias.php?idcat=<?= $result['idcat']; ?>"><ins><?= $result['nome'];?></ins></a>
            <?php
            $subCats = $pdo->prepare("select * from ecommerce.subcategorias where idcat=? order by idsubcat asc");
            $subCats->execute(array($id));
            if ($subCats->rowCount() >= 1):
                echo '<ul>';
                foreach ($subCats->fetchAll() as $result2):
                    echo '<li>';
                    //echo '<a href="'.$result2['url'].'">'.$result2['nome'].'</a>';
                    ?>
                    <a href="<?= $result2['url'] . '?idsubcat=' . $result2['idsubcat']; ?>"><?= $result2['nome']?></a>
                    <?php
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