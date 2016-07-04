<?php
foreach ($prod->fetchAll() as $result3):
    if ($i < $loop) {
        ?>
        <td>
            <img src="<?= $result3['caminho'] . $result3['foto']; ?>">
            <figcaption>
                <strong><?= $result3['nome'] . $result3['resumem']; ?></strong>
            </figcaption>
            <br><strong>Por: R$ <?= $result3['precio']; ?></strong>
            <br><br><input type="button" class="kk" value="Adicionar ao carrinho">
        </td>
        <?php
    } elseif ($i = $loop)
    { ?>
        <td>
            <img src="<?= $result3['caminho'] . $result3['foto']; ?>">
            <figcaption>
                <strong><?= $result3['nome'] . $result3['resumem']; ?></strong>
            </figcaption>
            <br><strong>Por: R$ <?= $result3['precio']; ?></strong>
            <br><br><input type="button" class="kk" value="Adicionar ao carrinho">
        </td>
        </tr>
        <tr>
        <?php $i = 0;
    }
    $i++;
endforeach;
?>