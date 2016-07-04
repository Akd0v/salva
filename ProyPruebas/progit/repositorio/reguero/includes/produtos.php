<?php
require_once "connect/connect.php";
?>
<link rel="stylesheet" href="CSS/style.css">

<?php
    $loop = 4;
    $i=1;
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
                    <img src="'.$result3['caminho'].$result3['foto'].'">
                    <figcaption>
                        <strong>'.$result3['nome'].$result3['resumem'].'</strong>
                    </figcaption>
                    <br><strong>Por: R$ '.$result3['precio'].'</strong>
                    <br><br><input type="button" class="kk" value="Adicionar ao carrinho">
                
                
                </td>
                </tr>
                <tr>
                ';
            $i=0;
            }
        $i++;
        endforeach;
 ?>