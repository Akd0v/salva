<?php
$loop = 4;
$i=1;
$rows_per_page= 8;
$num_rows = $produto->rowCount();
$lastpage= ceil($num_rows / $rows_per_page);
$page=(int)$page;
if($page > $lastpage){
    $page= $lastpage;
}
if($page < 1){
    $page=1;
}
$limit= 'LIMIT '. ($page -1) * $rows_per_page . ',' .$rows_per_page;
$prod =$pdo->prepare("select * from ecommerce.produtos P where P.idcat in (select C.idcat from ecommerce.categorias C where C.idcat=? or C.pai=?) order by nome asc $limit");
$prod->execute(array($idCat,$idCat));
