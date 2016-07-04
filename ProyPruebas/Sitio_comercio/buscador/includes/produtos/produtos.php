<?php
foreach ($prod->fetchAll() as $result3):
    if ($i < $loop) {
        ?>
        <td>
            <img src="<?= $result3['caminho'] . $result3['foto'];?>">
            <figcaption>
                <strong><?= $result3['nome'];?></strong> &nbsp;&nbsp; <strong><?=$result3['resumem'];?></strong>
            </figcaption>
            <br><strong>Por: R$ <?= number_format($result3['precio'],2,",",".");?></strong>
        </td>
        <?php
    } elseif ($i = $loop)
    { ?>
        <td>
            <img src="<?= $result3['caminho'] . $result3['foto'];?>">
            <figcaption>
                <strong><?= $result3['nome'];?></strong> <br>
                <strong><?=$result3['resumem'];?></strong>
            </figcaption>
            <br><strong>Por: R$ <?= number_format($result3['precio'],2,",",".");?></strong>
        </td>
        </tr>
        <tr>
        <?php $i = 0;
    }
    $i++;
endforeach;
?>