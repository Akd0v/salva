<?php

/**
 * Created by PhpStorm.
 * User: JulioC
 * Date: 19/05/2016
 * Time: 08:21
 */
class db_connect
{
    private static $instance;
    private static $dns = "mysql:host=localhost;dbname=ecommerce";
    private static $user = 'root';
    private  static $pass = 'mestre';
    public $pdo;

    /**
     * db_connect constructor.
     */
    private function __construct()
    {
        try {
            $this->pdo = new PDO(self::$dns,self::$user,self::$pass);
            $this->pdo->exec("SET CHARACTER SET utf8");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }

    /**
     * @return mixed
     */
    public static function Singlenton()
    {
        if (!isset(self::$instance)) {
            $clase = __CLASS__;
            self::$instance = new $clase;
        }
        return self::$instance;
    }

    /*private function open_conection(){
       $this->pdo = new PDO(self::$dns,self::$user,self::$pass);
    }

    private function close_conection(){
        $this->pdo = null;
    }

    protected function execute_single_query(){
        $this->open_conection();
        $this->pdo->query($this->query);
        $this->close_conection();
    }

    protected function get_results_from_query(){
        $this->open_conection();
        $result = $this->pdo->query($this->query);
        while ($this->rows=$result->fetch(PDO::FETCH_ASSOC))
            $result = null;
        $this->close_conection();
        array_pop($this->rows);
    }*/

    public function __clone()
    {
        trigger_error("Não é permitido clonar!!!", E_USER_ERROR)  ;
    }

}