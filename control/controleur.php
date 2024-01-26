<?php
class Controleur {
    private $vue;

    public function __construct(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        $this->vue = new View();
    }

    public function accueil(){
        $uploadModel = new Upload();
        $donneesCompetence = [];
        if(isset($_POST["fileSubmit"])){
            $uploadModel->uploadExcelData();
        }
        $donneesCompetence = (new Competence)->getCompetence();
        (new View)->accueil($donneesCompetence);
    }
    public function erreur404(){
        (new View)->erreur404();
    }
}
?>