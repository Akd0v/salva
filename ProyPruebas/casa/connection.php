<?php
/**
 * Created by PhpStorm.
 * User: yulaimy
 * Date: 10-04-2016
 * Time: 09:22 AM
 */
    $connection = mysqli_connect("localhost", "root","mestre");

    if(!$connection){
        die("Could not connect: ". mysqli_error($connection));
    }

    mysql_close($connection);
?>