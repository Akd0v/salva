<?php

class livro
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
    public  function getLivro()
    {
        try
        {
            $query = $this->dbh->prepare('SELECT * FROM livros');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function delete_Livro($idLivros)
    {
        try
        {
            $query = $this->dbh->prepare('DELETE FROM livros where id_produto= ?');
            $query->bindParam(1, $idLivros);
            $query->execute();
            $this->dbh = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function insert_Livro($titulo, $tomo, $autor, $cantidade, $precio)
    {
        try
        {
            $query = $this->dbh->prepare('INSERT INTO livros VALUES (NULL , ?, ?, ?,?,?)');
            $query->bindParam(1,$titulo);
            $query->bindParam(2,$tomo);
            $query->bindParam(3,$autor);
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

    public function update_Livro($idLivros, $titulo, $tomo, $autor, $cantidade, $precio)
    {
        try
        {
            $query = $this->dbh->prepare('UPDATE livros SET titulo=?,tomo=?,autor=?,cantidade=?,precio=? WHERE idLivros=?');
            $query->bindParam(1,$idLivros);
            $query->bindParam(2,$titulo);
            $query->bindParam(3,$tomo);
            $query->bindParam(4,$autor);
            $query->bindParam(5,$cantidade);
            $query->bindParam(6,$precio);
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