<?php

class carrinho
{

    private static $instance;
    /**
     * @var PDO
     */
    private $dbh;

    private function __construct()
    {
        try
        {
            $this->dbh = new PDO('mysql:host=localhost;dbname=ecommerce','root','mestre');
            $this->dbh->exec("SET CHARACTER SET utf8");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
        catch (PDOException $e)
        {
            print "Error!: ". $e->getMessage();
            die();
        }
    }

    /**
     * @return $this
     */
    public static function Singlenton()
    {
        if (!isset(self::$instance))
        {
            $clase = __CLASS__;
            self::$instance = new $clase;
        }
        return self::$instance;
    }

    /**
     * @return mixed
     */
    public  function getCarrinho()
    {
        try
        {
            $query = $this->dbh->prepare('SELECT * FROM carrinho');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function delete_Carrinho($idcarrinho)
    {
        try
        {
            $query = $this->dbh->prepare('DELETE FROM ecommerce. where idcarrinho= ?');
            $query->bindParam(1, $idcarrinho);
            $query->execute();
            $this->dbh = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function insert_Carrinho($id_produto, $cantidade, $precio)
    {
        try
        {
            $query = $this->dbh->prepare('INSERT INTO carrinho VALUES (NULL , ?, ?, ?)');
            $query->bindParam(1,$id_produto);
            $query->bindParam(2,$cantidade);
            $query->bindParam(3,$precio);
            $query->execute();
            $this->dbh = null;

        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function update_Carrinho($idcarrinho, $id_produto, $cantidade, $precio)
    {
        try
        {
            $query = $this->dbh->prepare('UPDATE carrinho SET id_produto=?,cantidade=?,suma=? WHERE idcarrinho=?');
            $query->bindParam(1,$idcarrinho);
            $query->bindParam(2,$id_produto);
            $query->bindParam(3,$cantidade);
            $query->bindParam(4,$precio);
            $query->execute();
            $this->dbh = null;
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
