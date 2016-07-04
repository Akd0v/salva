<?php

/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 16/05/2016
 * Time: 11:04
 */

class carrinho
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
    public function getCarrinho()
    {
        try
        {
            $query = $this->pdo->prepare('SELECT * FROM ecommerce.carrinho');
            $query->execute();
            return $query->fetchAll();
            $this->pdo = null;
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
            $query = $this->pdo->prepare('DELETE FROM ecommerce.carrinho where idcarrinho = ?');
            $query->bindParam(1, $idcarrinho);
            $query->execute();
            $this->pdo = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function insert_Carrinho($valor, $iduser){
        try
        {
            $query = $this->pdo->prepare('INSERT INTO ecommerce.carrinho VALUES (NULL , ?, ?)');
            $query->bindParam(1,$valor);
            $query->bindParam(2,$iduser);
            $query->execute();
            $this->pdo = null;

        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function update_Carrinho($idcarrinho, $valor, $iduser)
    {
        try
        {
            $query = $this->pdo->prepare('UPDATE ecommerce.carrinho SET valor=?,iduser=? WHERE idcarrinho=?');
            $query->bindParam(1,$idcarrinho);
            $query->bindParam(2,$valor);
            $query->bindParam(3,$iduser);
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
