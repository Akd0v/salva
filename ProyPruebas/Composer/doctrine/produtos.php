<?php

class produtos
{
    private $idprodutos, $nome, $calidade;

    /**
     * produtos constructor.
     * @param $idprodutos
     * @param $nome
     * @param $calidade
     */
    public function __construct($idprodutos, $nome, $calidade)
    {
        $this->idprodutos = $idprodutos;
        $this->nome = $nome;
        $this->calidade = $calidade;
    }

    /**
     * @return mixed
     */
    public function getIdprodutos()
    {
        return $this->idprodutos;
    }

    /**
     * @param mixed $idprodutos
     */
    public function setIdprodutos($idprodutos)
    {
        $this->idprodutos = $idprodutos;
    }

    /**
     * @return mixed
     */
    public function getNome($nome)
    {
        return $this->nome = $nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getCalidade($calidade)
    {
        return $this->calidade = $calidade;
    }

    /**
     * @param mixed $calidade
     */
    public function setCalidade($calidade)
    {
        $this->calidade = $calidade;
    }



}
