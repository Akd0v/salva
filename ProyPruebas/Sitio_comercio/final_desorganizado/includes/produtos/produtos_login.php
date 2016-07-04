
<?php
foreach ($prod->fetchAll() as $result3):
    if ($i < $loop) {
        $idproduto = $result3['idproduto'];
        ?>
        <form action="../../carrinho.php?acao=add&&idproduto=<?= $idproduto?>" method="post">
            <td>
                <img src="<?= $result3['caminho'] . $result3['foto']; ?>">
                <figcaption>
                    <strong><?= $result3['nome'];?>&nbsp;<?=$result3['resumem']; ?></strong>
                </figcaption>
                <br><strong>Por: R$ <?= number_format($result3['precio'],2,",",".");?></strong>
                <br><br><input type="submit" class="kk" value="Adicionar ao carrinho">
            </td>
        </form>
        <?php
    } elseif ($i = $loop)
    {
        $idproduto = $result3['idproduto'];?>
        <form action="../../carrinho.php?acao=add&&idproduto=<?= $idproduto?>" method="post">
            <td>
                <img src="<?= $result3['caminho'] . $result3['foto']; ?>">
                <figcaption>
                    <strong><?= $result3['nome'];?>&nbsp;<?=$result3['resumem']; ?></strong>
                </figcaption>
                <br><strong>Por: R$ <?= number_format($result3['precio'],2,",",".");?></strong>
                <br><br><input type="submit" class="kk" value="Adicionar ao carrinho">
            </td>
            </tr>
            <tr>
        </form>
        <?php $i = 0;
    }
    $i++;
endforeach;
?>

