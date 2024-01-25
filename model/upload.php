<?php
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

    private function uploadExcelData(){
        if(isset($_POST["fileSubmit"])){
            $file_error = $_FILES["excelFile"]["error"];
            switch ($file_error){
                case UPLOAD_ERR_OK:
                    $messageErreur = "Le fichier Excel a été traité avec succès.";
                    $filesInfo = finfo_open(FILEINFO_MIME_TYPE);
                    $mimeType = finfo_file($filesInfo, $_FILES["excelFile"]["tmp_name"]);
                    finfo_close($filesInfo);
                    switch ($mimeType){
                        case 'application/vnd.ms-excel':
                        case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
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

}
?>