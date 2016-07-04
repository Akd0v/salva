<?php
require_once 'db_connect.php';
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

    private function __construct()
    {
        $this->pdo = db_connect::Singlenton()->pdo;
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
            return $query;
            $this->pdo = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function getCategoriasIdCat($idcat)
    {
        try
        {
            $query = $this->pdo->prepare("SELECT * FROM ecommerce.categorias WHERE idcat = ?");
            $query->bindParam(1,$idcat);
            $query->execute();
            return $query;
            $this->pdo = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }
    /*public function delete_Categorias($idcat)
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
    }*/

   /* public function insert_Categorias($nome, $pai, $nivel)
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
    }*/

    /*public function update_Categorias($idcat, $nome, $pai, $nivel)
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
    }*/

    public function menu()
    {
        try
        {
            $query = $this->pdo->query("SELECT * FROM ecommerce.categorias ORDER BY nome ASC");
            while($row = $query->fetch(PDO::FETCH_OBJ))
            {
                $array_menu[$row->pai][$row->idcat] = array('nome' => $row->nome, 'pai' => $row->pai, 'idcat' => $row->idcat, 'nivel' => $row->nivel);
            }
            return $array_menu;
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
