<?php
function db_connect($dsn, $user, $pass) {
    try{
    $con = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND
        => "SET NAMES utf8"));
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $con;
    } catch (PDOException $ex) {
die("Erreur lors de la requête SQL : ".$ex->getMessage());
}
}
