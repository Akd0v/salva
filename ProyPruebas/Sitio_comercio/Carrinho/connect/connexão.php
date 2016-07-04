<?php

/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 16/05/2016
 * Time: 11:13
 */
class connexão
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
}
