<?php
$loop = 4;
$i=1;
$rows_per_page= 8;
$num_rows = $prodCat->rowCount();
$lastpage= ceil($num_rows / $rows_per_page);
$page=(int)$page;
if($page > $lastpage){
    $page= $lastpage;
}
if($page < 1){
    $page=1;
}

$limit = 'LIMIT ' . ($page - 1) * $rows_per_page . ',' . $rows_per_page;
$pro = produtos::Singlenton();
$prod = $pro->produtoCategorias2($idCat, $limit);

