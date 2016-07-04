
<?php
function MenuInfinito( array $menuTotal , $pai, $nivel){

    str_repeat( "\t" , $nivel )?><ul><?php PHP_EOL;

    foreach( $menuTotal[$pai] as $idMenu => $menuItem)
    {
        str_repeat( "\t" , $nivel + 1 );?><li><a href="http://localhost:8080/categorias.php?idcat=<?=$menuItem['idcat'];?>"><?=$menuItem['nome'];?></a><?= PHP_EOL;?>
        <?php
        if( isset( $menuTotal[$idMenu] ) )
        {
            MenuInfinito( $menuTotal , $idMenu , $nivel + 2);
        }
        str_repeat( "\t" , $nivel + 1 );?></li><?= PHP_EOL;?><?php
    }
    str_repeat( "\t" , $nivel )?></ul><?= PHP_EOL;?>
    <?php
}

$query = $pdo->query('SELECT * FROM ecommerce.categorias ORDER BY nome ASC');

while($row = $query->fetch(PDO::FETCH_OBJ))
{
    $menuItens[$row->pai][$row->idcat] = array('nome' => $row->nome, 'pai' => $row->pai, 'idcat' => $row->idcat, 'nivel' => $row->nivel);
}?>
<nav id="menu"><?php
    MenuInfinito($menuItens,0,0);
    ?>
</nav>