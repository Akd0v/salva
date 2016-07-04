<?php
/**
 * Created by PhpStorm.
 * User: yulaimy
 * Date: 10-04-2016
 * Time: 04:09 PM
 */
    $connection = @mysql_connect("localhost","root","");

    if (!$connection){
        exit("Database error :". mysql_error(). "-". mysql_errno());
    }

    mysql_select_db("taller");

    $query = mysql_query("SELECT * FROM agenda", $connection);

    //echo "Registros: ". mysql_num_rows($query);

    //$data = mysql_fetch_assoc($query);
    while ($data = mysql_fetch_assoc($query)){
    //die(var_dump($data));
    echo "Nombre: ". $data["Name"]. "<br />";
    echo "E-mail: ". $data["Email"]. "<br />";
    echo "Telf.: ". $data["Phone"]. "<br /><hr />";
    }
?>