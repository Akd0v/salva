<?php

/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 16/05/2016
 * Time: 11:04
 */

class produtos
{
    private static $instance;
    /**
     * @var PDO
     */
    private $pdo;
    private $host = 'localhost';
    private $user = 'root';
    private $pass = 'mestre';
    private $db_name = 'ecommerce';
    private $db = 'mysql';

    private function __construct()
    {
        try {
            $this->pdo = new PDO("db:host;db_name", 'user', 'pass');
            $this->pdo->exec("SET CHARACTER SET utf8");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }

    /**
     * @return $this
     */
    public static function Singlenton()
    {
        if (!isset(self::$instance)) {
            $clase = __CLASS__;
            self::$instance = new $clase;
        }
        return self::$instance;
    }

    /**
     * @return mixed
     */
    public function getProdutos()
    {
        try
        {
            $query = $this->pdo->prepare('SELECT * FROM ecommerce.produtos');
            $query->execute();
            return $query->fetchAll();
            $this->pdo = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function delete_Produtos($idproduto)
    {
        try
        {
            $query = $this->pdo->prepare('DELETE FROM ecommerce.produtos where idproduto = ?');
            $query->bindParam(1, $idproduto);
            $query->execute();
            $this->pdo = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function insert_Produtos($nome, $resumen, $precio, $caminho, $foto, $idcat, $idcarrinho, $idventa)
    {
        try
        {
            $query = $this->pdo->prepare('INSERT INTO ecommerce.categorias VALUES (NULL , ?, ?, ?, ?, ?, ?, ?, ?)');
            $query->bindParam(1,$nome);
            $query->bindParam(2,$resumen);
            $query->bindParam(3,$precio);
            $query->bindParam(4,$caminho);
            $query->bindParam(5,$foto);
            $query->bindParam(6,$idcat);
            $query->bindParam(7,$idcarrinho);
            $query->bindParam(8,$idventa);
            $query->execute();
            $this->pdo = null;

        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function update_Produtos($idproduto, $nome, $resumen, $precio, $caminho, $foto, $idcat, $idcarrinho, $idventa)
    {
        try
        {
            $query = $this->pdo->prepare('UPDATE ecommerce.produtos SET nome=?,resumem=?,precio=?,caminho=?,foto=?,idcat=?,idcarrinho=?,idventa=? WHERE idproduto=?');
            $query->bindParam(1,$idproduto);
            $query->bindParam(2,$nome);
            $query->bindParam(3,$resumen);
            $query->bindParam(4,$precio);
            $query->bindParam(5,$caminho);
            $query->bindParam(6,$foto);
            $query->bindParam(7,$idcat);
            $query->bindParam(8,$idcarrinho);
            $query->bindParam(9,$idventa);
            $query->execute();
            $this->pdo = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function produtoCategorias($idCat){
        try
        {
            $query = $this->pdo->prepare('select * from ecommerce.produtos P where P.idcat in (select C.idcat from ecommerce.categorias C where C.idcat=? or C.pai=?) order by nome asc');
            $query->bindParam(1,$idCat);
            $query->bindParam(2,$idCat);
            $query->execute();
            $this->pdo = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function __clone()
    {
        trigger_error("Não é permitido clonar!!!", E_USER_ERROR)  ;
    }
}
