<?php
/*$row = 1;
$fp = fopen ("logs/test.csv","r");
while ($data = fgetcsv ($fp, 1000, ",")) {
    $num = count ($data);
    print "<p> $num fields in line $row: <br>";
    $row++;
    for ($c=0; $c<$num; $c++) {
        print $data[$c] . "<br>";
    }
}
fclose ($fp);*/
/*$fd = fopen ("logs/registro.log", "r");
while (!feof($fd)) {
    $buffer = fgets($fd, 4096);
    echo $buffer;
}
fclose ($fd);*/

/*$fp = fopen("logs/registro.log", "a+");
fputs($fp, "probando esta kk");
$fp= fopen("logs/registro.log", "r");

while ($linha = fgets($fp))
{
    echo $linha .'<br>';
}
echo fgets($fp);
fclose($fp);*/

$fp = "logs/test.csv";
$fh = dirname($fp);
if (is_file($fp))
    echo 'true';
else
    echo 'false';




?>