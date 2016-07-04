<?php


class smartPhones
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
    public  function getSmartPhone()
    {
        try
        {
            $query = $this->dbh->prepare('SELECT * FROM smartphones');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function delete_SmartPhone($id_produto)
    {
        try
        {
            $query = $this->dbh->prepare('DELETE FROM smartphones where id_produto= ?');
            $query->bindParam(1, $id_produto);
            $query->execute();
            $this->dbh = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function insert_SmartPhone($marca, $cantidade, $precio)
    {
        try
        {
            $query = $this->dbh->prepare('INSERT INTO smartphones VALUES (NULL , ?, ?, ?)');
            $query->bindParam(1,$marca);
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

    public function update_SmartPhone($id_produto, $marca, $cantidade, $precio)
    {
        try
        {
            $query = $this->dbh->prepare('UPDATE smartphones SET marca=?,cantidade=?,precio=? WHERE id_produto=?');
            $query->bindParam(1,$id_produto);
            $query->bindParam(2,$marca);
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