<?php
/*function filtroPorNome($pessoa) {
    return $pessoa['nome'] == 'Italo';
}

print_r(array_filter($nome, 'filtroPorNome'));

$idades = array_column($nome, 'idade');

$idadeTotal = array_sum($idades);

echo $idadeTotal/count($nome);

var_dump($idadeTotal);*/


/*$input_array = array("FirSt" => 1, "SecOnd" => 4);

print_r(array_change_key_case($input_array, CASE_LOWER));*/

/*$input_array = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j');
print_r(array_chunk($input_array, 2)); ECHO '<br><br><br><br>';
print_r(array_chunk($input_array, 2, true));*/

// Array representando un conjunto de registros posibles devueltos desde una base de datos
/*$registros = array(
    array(
        'id' => 2135,
        'nombre' => 'John',
        'apellido' => 'Doe',
    ),
    array(
        'id' => 3245,
        'nombre' => 'Sally',
        'apellido' => 'Smith',
    ),
    array(
        'id' => 5342,
        'nombre' => 'Jane',
        'apellido' => 'Jones',
    ),
    array(
        'id' => 5623,
        'nombre' => 'Peter',
        'apellido' => 'Doe',
    )
);

$nombres_id = array_column($registros, 'nombre', 'id');
print_r($nombres_id);*/
/*class Usuario
{
    public $nombre_usuario;

    public function __construct(string $nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;
    }
}

$usuarios = [
    new Usuario('usuario 1'),
    new Usuario('usuario 2'),
    new Usuario('usuario 3'),
];

print_r(array_column($usuarios, 'nombre_usuario'));*/
/*class Persona
{
    private $nombre;
    private $idade;

    public function __construct(string $nombre, int $idade)
    {
        $this->nombre = $nombre;
        $this->idade = $idade;
    }

    public function __get($prop)
    {
        return $this->$prop;
    }

    public function __isset($prop) : bool
    {
        return isset($this->$prop);
    }
}

$gente = [
    new Persona('Fred', 23),
    new Persona('Jane', 21),
    new Persona('John', 50),
];



print_r(array_column($gente, 'nombre', 'idade'));*/

/*$a = array('green', 'red', 'yellow');
$b = array('avocado', 'apple', 'banana');
$c = array_combine($a, $b);

print_r($c);*/

/*$si = array('esto', 'es', 'un array');

echo is_array($si) ? 'Array' : 'No es un array';

echo "<br>";

$no = 'esto es un string';

echo is_array($no) ? 'Array' : 'No es un array';*/

/*$datos = "foo:*:1023:1000::/home/foo:/bin/sh";
list($user, $pass, $uid, $gid, $gecos, $home, $shell) = explode(":", $datos);
echo $user; // foo
echo '<br>';
echo $pass; // *
echo '<br>';
echo $gecos;//
echo '<br>';
echo $shell;*/

/*$str = 'hypertext language programming';
$caracteres = preg_split('/ /', $str, -1, PREG_SPLIT_OFFSET_CAPTURE);
print_r($caracteres);*/

/*$array1 = array(0, 1, 2);
$array2 = array("00", "01", "2");
$resultado = array_diff_assoc($array2, $array1);
print_r($resultado);*/

/*$array1 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);
$array2 = array('green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8);

var_dump(array_diff_key($array2, $array1));*/

/*$array1    = array("a" => "green", "red", "blue", "red");
$array2    = array("b" => "green", "yellow", "red", "orange");
$resultado = array_diff($array2, $array1);

print_r($resultado);*/


/*$a = array_fill(5, 6, 'banana');
$b = array_fill(-2, 3 ,'pear');
print_r($a);
echo '<br>';
print_r($b);*/

/*function impar($var)
{
    // Retorna siempre que el número entero sea impar
    return($var & 1);
}

function par($var)
{
    // Retorna siempre que el número entero sea par
    return(!($var & 1));
}

$array1 = array("a"=>1, "b"=>2, "c"=>3, "d"=>4, "e"=>5);
$array2 = array(6, 7, 8, 9, 10, 11, 12);

echo "Impar:\n";
print_r(array_filter($array1, "impar"));
echo '<br>';
echo "Par:\n";
print_r(array_filter($array2, "par"));*/

/*$array1 = array(2, 4, 6, 8, 10, 12);
$array2 = array(1, 2, 3, 4, 5, 6);

var_dump(array_intersect($array1, $array2));
echo '<br>';
var_dump(array_intersect($array2, $array1));*/

/*$array1 = array("a" => "green", "b" => "brown", "blue", "red");
$array2 = array("a" => "green", "b" => "yellow", "red", "blue");
$result_array = array_intersect_assoc($array1, $array2);
print_r($result_array);
var_dump(array_intersect_assoc($array1, $array2));*/

/*$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
$array2 = array("a" => "GREEN", "B" => "brown", "red", "yellow");

print_r(array_intersect_uassoc($array1, $array2, "strcasecmp"));*/

/*$func = function($valor) {
    return $valor * 2;
};

print_r(array_map($func, range(1, 5)));*/

/*$stack = array("naranja", "plátano", "manzana", "frambuesa");
$fruit = array(array_pop($stack),array_pop($stack));

print_r($fruit);
echo '<br>';
print_r($stack);*/

/*$a = array(2, 4, 6, 8);
echo "producto(a) = " . array_product($a) . "\n";
echo "producto(array()) = " . array_product(array()) . "\n";*/

/*$entrada = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank","Pepe", "Cuca", "Marta");
$claves_aleatorias = array_rand($entrada, 2);
echo $entrada[$claves_aleatorias[0]] . "\n";
echo $entrada[$claves_aleatorias[1]] . "\n";*/

/*$base = array('cítricos' => array( "naranja") , 'bayas' => array("mora", "frambuesa"));
$reemplazos = array('cítricos' => array('piña'), 'bayas' => array('arándano'));

$cesta = array_replace_recursive($base, $reemplazos);
print_r($cesta);

echo '<br>';

$cesta = array_replace($base, $reemplazos);
print_r($cesta);*/

/*$input  = array("php", 4.0, array("verde", "rojo"));
$reversed = array_reverse($input);
$preserved = array_reverse($input, true);

print_r($input);
echo '<br>';
print_r($reversed);
echo '<br>';
print_r($preserved);*/

/*$info = array('café', 'marrón', 'cafeína');

// Enumerar todas las variables
list($bebida, $color, $energía) = $info;
echo "El $bebida es $color y la $energía lo hace especial.\n";
echo '<br>';

// Enumerar algunas de ellas
list($bebida, , $energía) = $info;
echo "El $bebida tiene $energía.\n";
echo '<br>';
// U omitir solo la tercera
list( , , $energía) = $info;
echo "Necesito $energía!\n";
echo '<br>';
// list() no funciona con cadenas
list($bar) = "abcde";
var_dump($bar); // NULL*/

/*$números = range(1, 20);
shuffle($números);
foreach ($números as $número) {
    echo "$número ";
}*/