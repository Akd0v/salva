<?php

/**
 * Created by PhpStorm.
 * User: yulaimy
 * Date: 10-04-2016
 * Time: 05:58 PM
 */
class Figura
{
    private $lados;
    private $medida;

    public function __construct($lados, $medida)
    {
        $this->lados=$lados;
        $this->medida=$medida;
    }

    public function perimetro()
    {
        return $this->lados * $this->medida;
    }
}