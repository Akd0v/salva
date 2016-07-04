<?php
 $arquivo = 'logs/registro.log';

$fh =  fopen($arquivo, 'r');

echo fgets($fh) . '<hr>';


while ($linha = fgets($fh))
{
  echo $linha .'<br>';
}
 fclose($fh);


 /*   $nome = array(    array( 'nome' => "Italo", 'idade' => 18 ),
        array( 'nome' => "Paulo", 'idade' => 20 ),
        array( 'nome' => "Andre", 'idade' => 21 ),
        array( 'nome' => "Rafael", 'idade' => 22 )
    );

function filtroPorNome($pessoa) {
    return $pessoa['nome'] == 'Italo';
}

print_r(array_filter($nome, 'filtroPorNome'));

$idades = array_column($nome, 'idade');

$idadeTotal = array_sum($idades);

echo $idadeTotal/count($nome);

var_dump($idadeTotal);*/





?>

