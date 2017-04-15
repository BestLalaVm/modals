<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 2/25/2017
 * Time: 2:17 PM
 */
function restore($sql,$server_name,$database_name,$username,$password)
{
    $pdo = new \PDO("mysql:host=".$server_name.";dbname=".$database_name,$username,$password,array(\PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES'utf8';"));
    $pdo->query($sql);
    unset($pdo);
}