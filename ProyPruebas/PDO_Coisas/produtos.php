<?php
require_once 'db_connect.php';
/**
 * Created by PhpStorm.
 * User: julioC
 * Date: 16/05/2016
 * Time: 11:04
 */

class produtos
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
     * @return todos os produtos
     */
    public function getProdutos()
    {
        try
        {
            $query = $this->pdo->prepare('SELECT * FROM ecommerce.produtos ORDER BY nome ASC ');
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
     * @param $id
     * @return produto por suo id
     */
    public function getProdutosId($id)
    {
        try
        {
            $query = $this->pdo->prepare('SELECT * FROM ecommerce.produtos WHERE idproduto = ? ORDER BY nome ASC ');
            $query->bindParam(1,$id);
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
     * @param $idCat
     * @return as categorias e suas subcategoria por suo id
     */
    public function produtoCategorias($idCat)
    {
        try
        {
            $query = $this->pdo->prepare('select * from ecommerce.produtos P where P.idcat in (select C.idcat from ecommerce.categorias C where C.idcat=? or C.pai=?) order by nome asc');
            $query->bindParam(1,$idCat);
            $query->bindParam(2,$idCat);
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
     * @param $idCat
     * @param $limit
     * @return as categorias e suas subcategoria
     */
    public function produtoCategorias2($idCat, $limit)
    {
        try
        {
            $query = $this->pdo->prepare("select * from ecommerce.produtos P where P.idcat in (select C.idcat from ecommerce.categorias C where C.idcat=? or C.pai=?) order by nome asc $limit");
            $query->bindParam(1,$idCat);
            $query->bindParam(2,$idCat);
            $query->execute();
            $this->pdo = null;
            return ($query);
        }
        catch (PDOException $e)
        {
            throw new PDOException("Error  : " .$e->getMessage());
        }
    }

    /**
     * @return cantidade total de produtos
     */
    public function getProdutosNumRows()
    {
        try
        {
            $query = $this->pdo->query('SELECT * FROM ecommerce.produtos ORDER BY nome ASC ');
            return $query->rowCount();
            $this->pdo = null;
        }
        catch (PDOException $e)
        {
            throw new PDOException("Error  : " .$e->getMessage());
        }
    }

    /**
     * @param $search
     * @return cantidade de produtos que contém a pesquisa
     */
    public function getSearchProdutosNumRows($search)
    {
        try
        {
            $query = $this->pdo->query("select * from ecommerce.produtos P where P.nome like '%$search%' or P.resumem like '%$search%' order by nome asc");
            return $query->rowCount();
            $this->pdo = null;
        }
        catch (PDOException $e)
        {
            throw new PDOException("Error  : " .$e->getMessage());
        }
    }

    /**
     * @param $rows_per_page
     * @param $search
     * @return cantidade de páginas
     */
    public function getLastPage($rows_per_page,$search)
    {
        try
        {
            $num_rows = $this->getSearchProdutosNumRows($search);
            return ceil($num_rows / $rows_per_page);
        }
        catch (PDOException $e)
        {
            throw new PDOException("Error  : " .$e->getMessage());
        }
    }

    /**
     * @param $page
     * @return produtos por página
     */
public function produtoPage($page,$rows_per_page)
{
    try
    {
        $num_rows = $this->getProdutosNumRows();

        $lastpage= ceil($num_rows / $rows_per_page);
        $pag=(int)$page;
        if($pag > $lastpage){
            $pag= $lastpage;
        }
        if($pag < 1)
        {
            $pag=1;
        }
        $limit= 'LIMIT '. ($pag -1) * $rows_per_page . ',' .$rows_per_page;
        $query = $this->pdo->prepare("SELECT * FROM ecommerce.produtos ORDER BY nome ASC $limit");
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
     * @param $search
     * @param $page
     * @return produtos pesquisados por o cliente
     */
    public function produtoSearch($search,$page,$rows_per_page)
    {
        try
        {
                $num_rows = $this->getSearchProdutosNumRows($search);
                $lastpage = ceil($num_rows / $rows_per_page);
                $pag = (int)$page;
                if ($pag > $lastpage) {
                    $pag = $lastpage;
                }
                if ($pag < 1) {
                    $pag = 1;
                }
                $limit = 'LIMIT ' . ($pag - 1) * $rows_per_page . ',' . $rows_per_page;
                $prod = $this->pdo->prepare("select * from ecommerce.produtos P where P.nome like '%$search%' or P.resumem like '%$search%' order by nome asc $limit");
                $prod->execute();
                return $prod;
                $this->pdo = null;

        }
        catch (PDOException $e)
        {
            throw new PDOException("Error  : " .$e->getMessage());
        }
    }

   /* public function produtoFoto($)

$bd = new PDO('oci:', 'scott', 'tiger');
$sentencia = $bd->prepare("insert into images (id, contenttype, imagedata) " .
"VALUES (?, ?, EMPTY_BLOB()) RETURNING imagedata INTO ?");
$id = get_new_id(); // alguna función para asignar un nuevo ID

// Se asume que se está ejecutando como parte de un formulario de subida de ficheros
// Se puede encontrar más información en la documentación de PHP

$fp = fopen($_FILES['file']['tmp_name'], 'rb');

$sentencia->bindParam(1, $id);
$sentencia->bindParam(2, $_FILES['file']['type']);
$sentencia->bindParam(3, $fp, PDO::PARAM_LOB);

$bd->beginTransaction();
$sentencia->execute();
$bd->commit();*/

     public function insert_Produtos($nome, $resumen, $precio, $caminho, $foto, $idcat, $idcarrinho, $idventa)
     {
         try
         {
             $fp = fopen($_FILES['file']['fotos'], 'rb');
             $query = $this->pdo->prepare('INSERT INTO ecommerce.categorias VALUES (NULL , ?, ?, ?, ?, EMPTY_BLOB(), ?, ?, ?) RETURNING $foto ');
             $query->bindParam(1,$nome);
             $query->bindParam(2,$resumen);
             $query->bindParam(3,$precio);
             $query->bindParam(4,$caminho);
             $query->bindParam(5,$foto);
             $query->bindParam(6,$idcat);
             $query->bindParam(7,$idcarrinho);
             $query->bindParam(8,$idventa);
             $query->execute();
             $this->pdo = null;

         }
         catch (PDOException $e)
         {
             $e->getMessage();
         }
     }

     /*  public function delete_Produtos($idproduto)
    {
        try
        {
            $query = $this->pdo->prepare('DELETE FROM ecommerce.produtos where idproduto = ?');
            $query->bindParam(1, $idproduto);
            $query->execute();
            $this->pdo = null;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }*/

    /* public function update_Produtos($idproduto, $nome, $resumen, $precio, $caminho, $foto, $idcat, $idcarrinho, $idventa)
     {
         try
         {
             $query = $this->pdo->prepare('UPDATE ecommerce.produtos SET nome=?,resumem=?,precio=?,caminho=?,foto=?,idcat=?,idcarrinho=?,idventa=? WHERE idproduto=?');
             $query->bindParam(1,$idproduto);
             $query->bindParam(2,$nome);
             $query->bindParam(3,$resumen);
             $query->bindParam(4,$precio);
             $query->bindParam(5,$caminho);
             $query->bindParam(6,$foto);
             $query->bindParam(7,$idcat);
             $query->bindParam(8,$idcarrinho);
             $query->bindParam(9,$idventa);
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
