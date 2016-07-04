<?php

/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 16/05/2016
 * Time: 11:04
 */

class categorias
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
    public function getCategorias()
    {
        try
        {
            $query = $this->pdo->prepare('SELECT * FROM ecommerce.categorias');
            $query->execute();
            return $query->fetchAll();
            $this->pdo = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function delete_Categorias($idcat)
    {
        try
        {
            $query = $this->pdo->prepare('DELETE FROM ecommerce.categorias where idcat = ?');
            $query->bindParam(1, $idcat);
            $query->execute();
            $this->pdo = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function insert_Categorias($nome, $pai, $nivel)
    {
        try
        {
            $query = $this->pdo->prepare('INSERT INTO ecommerce.categorias VALUES (NULL , ?, ?, ?)');
            $query->bindParam(1,$nome);
            $query->bindParam(2,$pai);
            $query->bindParam(3,$nivel);
            $query->execute();
            $this->pdo = null;

        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function update_Categorias($idcat, $nome, $pai, $nivel)
    {
        try
        {
            $query = $this->pdo->prepare('UPDATE ecommerce.categorias SET nome=?,pai=?,nivel=? WHERE idcat=?');
            $query->bindParam(1,$idcat);
            $query->bindParam(2,$nome);
            $query->bindParam(3,$pai);
            $query->bindParam(4,$nivel);
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
