<?php
session_start();

if(!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = array();
}

if(isset($_GET['acao'])){

    if($_GET['acao'] == 'add'){
        $idproduto = $_GET['idproduto'];
        if(!isset($_SESSION['carrinho'][$idproduto])){
            $_SESSION['carrinho'][$idproduto] = 1;
        }else{
            $_SESSION['carrinho'][$idproduto] += 1;
        }
    }

    if($_GET['acao'] == 'delete'){
        $idproduto = $_GET['idproduto'];
        if(isset($_SESSION['carrinho'][$idproduto])){
            unset($_SESSION['carrinho'][$idproduto]);
        }
    }

    if($_GET['acao'] == 'update'){
        if(is_array($_POST['prod'])){
            foreach($_POST['prod'] as $idproduto => $qtd){
                $id  = intval($idproduto);
                $qtd = intval($qtd);
                if(!empty($qtd) || $qtd <> 0){
                    $_SESSION['carrinho'][$id] = $qtd;
                }else{
                    unset($_SESSION['carrinho'][$id]);
                }
            }
        }
    }

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Carrinho</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<nav id="seccioncarrinho">
    <table>
        <h3><ins>Carrinho de Compras</ins></h3>
        <thead>
        <tr>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>SubTotal</th>
            <th>Eliminar</th>
        </tr>
        </thead>
        <form action="?acao=update" method="post">
            <tbody>
            <?php
            if(count($_SESSION['carrinho']) == 0){
                echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
            }else{
                require_once 'class/produtos.php';
               // require("connect/connect.php");
                $total = 0;
                foreach($_SESSION['carrinho'] as $idproduto => $qtd){
                    $pro = produtos::Singlenton();
                    $qr = $pro->getProdutosId($idproduto);
                    $ln = $qr->fetch(PDO::FETCH_ASSOC);

                    $nome  = $ln['nome'];
                    $precio = number_format($ln['precio'], 2, ',', '.');
                    $sub   = number_format($ln['precio'] * $qtd, 2, ',', '.');

                    $total += $ln['precio'] * $qtd;
                    ?>
                    <tr>
                        <td><?=$nome;?></td>
                        <td><input type="text" size="3" name="prod[<?=$idproduto;?>]" value="<?=$qtd?>" /></td>
                        <td>R$ <?=$precio;?></td>
                        <td>R$ <?=$sub;?></td>
                        <td><a href="?acao=delete&&idproduto=<?=$idproduto;?>"><img src="fotos/delete.png"></a></td>
                    </tr>
                    <?php
                }
                $total = number_format($total, 2, ',', '.');
                ?>
                <tr>
                    <td colspan="4">Total</td>
                    <td>R$ <?=$total;?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5"><input type="submit" class="kk" value="Atualizar Carrinho" /></td>
            <tr>
                <td colspan="5"><a href="index_login.php">Continuar Comprando</a></td>
            <tr>
                <td colspan="5"><a href="venda.php?total=<?=$total;?>">Terminar Compra</a></td>
            </tfoot>
        </form>
    </table>
</nav>
</body>
</html>
