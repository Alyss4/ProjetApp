<?php
session_start();
$config = parse_ini_file("config.ini");
try{
    $pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
}
catch (Exception $e){
    echo "<h1> Attention !  Erreur de connexion à la base de données </h1>";
    echo $e->getMessage();
    exit; 
}

require("control/controleur.php")
?>