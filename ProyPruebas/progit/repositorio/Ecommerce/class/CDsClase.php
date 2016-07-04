<?php


class CD
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
    public  function get_CD()
    {
        try
        {
            $query = $this->dbh->prepare('SELECT * FROM cds');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function delete_CD($idCDs)
    {
        try
        {
            $query = $this->dbh->prepare('DELETE FROM ecommerce where idCDs= ?');
            $query->bindParam(1, $idCDs);
            $query->execute();
            $this->dbh = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function insert_CD($contenido, $capacidade, $cantidade, $precio)
    {
        try
        {
            $query = $this->dbh->prepare('INSERT INTO cds VALUES (NULL , ?, ?, ?,?)');
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

    public function update_CD($idCDs, $contenido, $capacidade, $cantidade, $precio)
    {
        try
        {
            $query = $this->dbh->prepare('UPDATE cds SET contenido=?,capacidade=?,cantidade=?,precio=? WHERE cds.idCDs=?');
            $query->bindParam(1,$idCDs);
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


