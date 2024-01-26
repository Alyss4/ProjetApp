<?php
class Eleve{
    private $pdo;
    public function __construct(){
        $config = parse_ini_file("config.ini");
        try{
            $this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function getEleve(){
        $sql = 'SELECT nom, prenom, idClasse FROM eleve';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetch();
    }
}
?>