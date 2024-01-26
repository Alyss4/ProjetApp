<?php
class typeNote{
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
}
?>