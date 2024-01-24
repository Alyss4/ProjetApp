<?php
class Matiere{
    private $pdo; 
    public function __construct(){
    $config = parse_ini_file("config.ini");
        try{
            $this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function getMatiereById($idMatiere){
        $sql = 'SELECT nomMatiere FROM Matiere WHERE id = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':id',$idMatiere, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch();
    }
    public function getMatiereByName($nomMatiere){
        $sql = 'SELECT * FROM Matiere WHERE nomMatiere = :nomMatiere';
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':nomMatiere', $nomMatiere, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch();
    }
}
?>