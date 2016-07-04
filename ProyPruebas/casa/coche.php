<?php

/**
 * Created by PhpStorm.
 * User: yulaimy
 * Date: 10-04-2016
 * Time: 05:03 PM
 */
class Coche
{
    public $velocidad = 100;
    private $serie = "abc123";
    private $encendido = false;
    static $llantas = 4;
    private $color = null;
    private $modelo = null;
    private $marca = null;

    public function __construct($color = "Rojo", $marca = "Nissan", $modelo="Versa")
    {
        $this->color = $color;
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo "Objeto destruido" . "<br/>";
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function estado()
    {
        return $this->encendido;
    }

    public function encender()
    {
       $this->encendido = true;
    }

    public function apagar()
    {
        $this->encendido = false;
    }
}

$Coche = new Coche("Negro", "Ford", "Lobo");

var_dump($Coche->estado()) . "<br/><br/>";

$Coche->encender();
var_dump($Coche->estado()) . "<br/><br/>";

echo $Coche->getColor() . "<br/>";
echo $Coche->getMarca() . "<br/>";
echo $Coche->getModelo();

$Coche->apagar();
var_dump($Coche->estado());

?>