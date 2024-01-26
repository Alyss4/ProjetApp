<?php
class Note{
    private $pdo; 
    public function __construct(){
        $config = parse_ini_file("config.ini");
        try{
            $this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function getBareme(){
        $sql = 'SELECT id,designation, points FROM typenote';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
    public function setNote(){
        $sql = "INSERT INTO bulletin (idEleve, idCompetence, idMatiere, idProfesseur, idTypeNote) VALUES (:idEleve, :idCompetence, :idMatiere, :idProfesseur, :idTypeNote)";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(":idEleve", $idEleve);
        $req->bindParam(":idCompetence", $idCompetence);
        $req->bindParam(":idMatiere",$idMatiere);
        $req->bindParam(":idProfesseur",$idProfesseur);
        $req->bindParam(":idTypeNote",$idTypeNote);
        if($req->execute()){
            $messageErreur = "Données ajoutée avec succès.";
        }else{
            $messageErreur = "Erreur lors de l'ajout des données.";
        }
        $req->execute();
    }
}
?>