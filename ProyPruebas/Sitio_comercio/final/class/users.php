<?php
require_once 'db_connect.php';
/**
 * Created by PhpStorm.
 * User: JulioC
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

    /**
     * users constructor.
     */
    private function __construct()
    {
        try
        {
            $this->pdo = db_connect::Singlenton()->pdo;
        }
        catch (PDOException $e)
        {
            print "Error!: ". $e->getMessage();
            die();
        }
    }

    /**
     * @return mixed
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
     * @param $user
     * @return confirma si o usuário existe
     */
    public  function getUsers($user)
    {
        try
        {
            $query = $this->pdo->prepare("SELECT user FROM ecommerce.users where user = ?");
            $query->bindParam(1, $user);
            $query->execute();
            return $query;
            $this->pdo = null;
        }
        catch (PDOException $e)
        {
            throw new PDOException("Error  : " .$e->getMessage());
        }
    }

    /**
     * @param $user
     * @param $pass
     * @return valida autenticação do usuário
     */
    public  function getUsersPassword($user,$pass)
    {
        try
        {
            $query = $this->pdo->prepare("SELECT user FROM ecommerce.users where user = ? and password = ?");
            $query->bindParam(1, $user);
            $query->bindParam(2, $pass);
            $query->execute();
            return $query;
            $this->pdo = null;
        }
        catch (PDOException $e)
        {
            throw new PDOException("Error  : " .$e->getMessage());
        }
    }

    /**
     * @param $user
     * @param $nome
     * @param $apellido
     * @param $email
     * @param $endereço
     * @param $password
     */
    public function insert_Users($user,$nome, $apellido, $email, $endereço, $password)
    {
        try
        {
            $query = $this->pdo->prepare('INSERT INTO users VALUES (NULL , ?, ?, ?, ?, ?, ?)');
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
            throw new PDOException("Error  : " .$e->getMessage());
        }
    }

    /* public function delete_Users($id)
    {
        try
        {
            $query = $this->pdo->prepare('DELETE FROM ecommerce.users where iduser = ?');
            $query->bindParam(1, $id);
            $query->execute();
            $this->pdo = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }*/

   /* public function update_Users($iduser, $user,$nome, $apellido, $email, $endereço, $password)
    {
        try
        {
            $query = $this->pdo->prepare('UPDATE users SET nombre=?,email=?,registro=? WHERE id=?');
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
    }*/

    public function __clone()
    {
        trigger_error("Não é permitido clonar!!!", E_USER_ERROR)  ;
    }
}