
<nav id="menu">
    <?php
    $cats = $pdo->prepare("select * from ecommerce.categorias order by nome asc");
    $cats->execute();
    if ($cats->rowCount() >= 1):?>
        <ul>
            <?php foreach ($cats->fetchAll() as $result):
                $id = $result['idcat'];?>
                <li>
                    <a href="http://localhost:8080/categorias.php?idcat=<?= $result['idcat']; ?>"><ins><?= $result['nome'];?></ins></a>
                    <?php
                    $subCats = $pdo->prepare("select * from ecommerce.subcategorias where idcat=? order by nome asc");
                    $subCats->execute(array($id));
                    if ($subCats->rowCount() >= 1):?>
                        <ul>
                            <?php foreach ($subCats->fetchAll() as $result2):?>
                                <li>
                                    <a href="http://localhost:8080/subcategorias.php?idsubcat=<?= $result2['idsubcat']; ?>"><?= $result2['nome'];?></a>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    <?php endif;?>
                </li>
            <?php endforeach;?>
        </ul>
    <?php endif;?>
</nav>