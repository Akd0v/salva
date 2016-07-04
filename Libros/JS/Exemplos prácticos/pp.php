<?php
$nome = array( 'nome' => "Italo", 'idade' => 18 ),
       array( 'nome' => "Paulo", 'idade' => 20 ),
       array( 'nome' => "Andre", 'idade' => 21 ),
       array( 'nome' => "Rafael", 'idade' => 22 );

$fp = fopen(exercicio.csv, 'w');
foreach ($nome as $linha) {
    fputcsv($fp, $linha);
}
fclose($fp);
?>