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

require("control/controleur.php");

require("view/view.php");

require ("model/competence.php");
require ("model/eleve.php");
require ("model/matiere.php");
require ("model/professeur.php");
require("model/note.php");
require ("model/upload.php");

if (isset($_GET["action"])){
    switch($_GET["action"]){
        case "accueil":
            (new controleur)->accueil();
            break;
        default:
            (new controleur)->erreur404();
            break;
    }
}else{
    (new controleur)->accueil();
}
?>