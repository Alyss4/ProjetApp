<?php
class View {
    public function entete(){
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>';
    }
    public function accueil($donneesCompetence){
        $this->entete();
        echo'
        <form method="post" enctype="multipart/form-data">
            <label for=""> Importez votre liste d\'élèves </label> 
            <input type="file" name="excelFile"/>
            <button type="submit" name="fileSubmit">Valider</button>
        </form>
        <table border = 1>
            <tbody>
                <tr>';
                foreach($donneesCompetence as $competence){
                    echo'
                    <td>Domaine '.$competence["domaine"].'<br>'.$competence["designation"].'</td>';
                }
                echo'
                </tr>
                <tr>';
                foreach($donneesCompetence as $competence){
                    echo'
                    <td>'.$competence["domaine"].'</td>';
                };
                echo'
                </tr>
            </tbody>
        </table>';
        $this->fin();
    }

    public function erreur404(){
        $this->entete();
        $this->fin();
    }

    public function fin(){
        echo "
        </body>
        </html>";
    }
}
?>