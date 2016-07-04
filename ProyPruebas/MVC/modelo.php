<?php
class Platillo
{
    private $platillo;
    private $pdo;

    public function __construct()
    {
        $this->platillo = array();
        $this->pdo = new PDO('mysql:host=localhost;dbname=restaurante', "root", "mestre");
    }

    private function set_names()
    {
        return $this->pdo->query("SET NAMES 'utf8'");
    }

    public function lista_platillos()
    {
        self::set_names();
        $sql="select nombre, precio from platillos where disponible = 1";
        foreach ($this->pdo->query($sql) as $res)
        {
            $this->platillo[]=$res;
        }
        return $this->platillo;
        $this->pdo=null;
    }
}
?>