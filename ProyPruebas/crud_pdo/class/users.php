<?php

/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 11/04/2016
 * Time: 15:44
 */
class users
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
            $this->dbh = new PDO('mysql:host=localhost;dbname=crud_pdo','root','mestre');
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
    public  function getUsers()
    {
        try
        {
            $query = $this->dbh->prepare('SELECT * FROM users');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function delete_Users($id)
    {
        try
        {
            $query = $this->dbh->prepare('DELETE FROM users where id = ?');
            $query->bindParam(1, $id);
            $query->execute();
            $this->dbh = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function insert_Users($name, $email, $fecha)
    {
        try
        {
            $query = $this->dbh->prepare('INSERT INTO users VALUES (NULL , ?, ?, ?)');
            $query->bindParam(1,$name);
            $query->bindParam(2,$email);
            $query->bindParam(3,$fecha);
            $query->execute();
            $this->dbh = null;

        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function update_Users($id, $name, $email, $fecha)
    {
        try
        {
            $query = $this->dbh->prepare('UPDATE users SET nombre=?,email=?,registro=? WHERE id=?');
            $query->bindParam(1,$id);
            $query->bindParam(2,$name);
            $query->bindParam(3,$email);
            $query->bindParam(4,$fecha);
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