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
    public function getUsers()
    {
        try
        {
            $query = $this->pdo->prepare('SELECT * FROM ecommerce.users');
            $query->execute();
            return $query->fetchAll();
            $this->pdo = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function delete_Users($iduser)
    {
        try
        {
            $query = $this->pdo->prepare('DELETE FROM ecommerce.users where iduser= ?');
            $query->bindParam(1, $iduser);
            $query->execute();
            $this->pdo = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function insert_Users($user, $nome, $apellido, $email, $endereço, $password)
    {
        try
        {
            $query = $this->pdo->prepare('INSERT INTO ecommerce.users VALUES (NULL , ?, ?, ?, ?, ?, ?)');
            $query->bindParam(1,$user);
            $query->bindParam(2,$nome);
            $query->bindParam(3,$apellido);
            $query->bindParam(4,$email);
            $query->bindParam(5,$endereço);
            $query->bindParam(6,$password);
            $query->execute();
            $this->pdo = null;

        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function update_Users($iduser, $nome, $apellido, $email, $endereço, $password)
    {
        try
        {
            $query = $this->pdo->prepare('UPDATE ecommerce.users SET nome=?,apellido=?,email=?,endereço=?,password=? WHERE iduser=?');
            $query->bindParam(1,$iduser);
            $query->bindParam(2,$user);
            $query->bindParam(3,$nome);
            $query->bindParam(4,$apellido);
            $query->bindParam(5,$email);
            $query->bindParam(6,$endereço);
            $query->bindParam(7,$password);
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