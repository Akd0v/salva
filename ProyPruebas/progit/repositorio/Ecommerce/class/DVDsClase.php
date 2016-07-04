<?php


class DVD
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
    public  function getDVD()
    {
        try
        {
            $query = $this->dbh->prepare('SELECT * FROM dvds');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function delete_DVD($idDVDs)
    {
        try
        {
            $query = $this->dbh->prepare('DELETE FROM dvds where id_produto= ?');
            $query->bindParam(1, $idDVDs);
            $query->execute();
            $this->dbh = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function insert_DVD($contenido, $capacidade, $cantidade, $precio)
    {
        try
        {
            $query = $this->dbh->prepare('INSERT INTO dvds VALUES (NULL , ?, ?, ?,?)');
            $query->bindParam(1,$contenido);
            $query->bindParam(2,$capacidade);
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

    public function update_DVD($idDVDs, $contenido, $capacidade, $cantidade, $precio)
    {
        try
        {
            $query = $this->dbh->prepare('UPDATE dvds SET contenido=?,capacidade=?,cantidade=?,precio=? WHERE idDVDs=?');
            $query->bindParam(1,$idDVDs);
            $query->bindParam(2,$contenido);
            $query->bindParam(3,$capacidade);
            $query->bindParam(4,$cantidade);
            $query->bindParam(5,$precio);
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