<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
class Upload{
    private $pdo;
    public function __construct(){
        $config = parse_ini_file("config.ini");
        try{
            $this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function uploadExcelData(){
        if(isset($_POST["fileSubmit"])){
            $file_error = $_FILES["excelFile"]["error"];
            switch ($file_error){
                case UPLOAD_ERR_OK:
                    $messageErreur = "Le fichier Excel a été traité avec succès.";
                    $file = $_FILES["excelFile"]["tmp_name"];
                    $filesInfo = finfo_open(FILEINFO_MIME_TYPE);
                    $mimeType = finfo_file($filesInfo, $_FILES["excelFile"]["tmp_name"]);
                    finfo_close($filesInfo);
                    switch ($mimeType){
                        case 'application/vnd.ms-excel':
                        case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                            $spreadSheet = IOFactory::load($file);
                            $contentSheet = $spreadSheet->getActiveSheet();
                            $data = $contentSheet->toArray();
                            $this->insertStudentDatabase($data);
                            $messageErreur="Le fichier Excel a été traité avec succès.";
                        break;
                        default:
                            $messageErreur = "La taille du fichier est trop grande.";
                        break;
                    }
                break;
                case UPLOAD_ERR_INI_SIZE: 
                    $messageErreur = "La taille du fichier est trop grande.";
                break;
                case UPLOAD_ERR_NO_FILE:
                    $messageErreur = "Aucun fichier n'a été trouvé";
                break;
                default:
                    $messageErreur = " Erreur innatendue lors du téléchargement du fichier.";
                break;
            }
        }
    }
    public function insertStudentDatabase($data){
        foreach ($data as $row){
            $nom = $row[1];
            $prenom = $row[2];
            $idClasse = $row[3];
            $sql = "INSERT INTO eleve (nom, prenom, idClasse) VALUES (:nom, :prenom, :classe)";
            $req = $this->pdo->prepare($sql);
            $req->bindParam(":nom",$nom);
            $req->bindParam(":prenom",$prenom);
            $req->bindParam(":classe", $idClasse);
            if ($req->execute()){
                $messageErreur = "Données ajoutés avec succès.";
            }else{
                $messageErreur = "Erreur lors de l'ajout des données.";
            }
        }
    }

}
?>