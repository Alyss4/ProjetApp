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
    public function accueil($donneesCompetence,$leBareme){
        $this->entete();
        echo'
        <form method="post" enctype="multipart/form-data">
            <label for=""> Importez votre liste d\'élèves </label> 
            <input type="file" name="excelFile"/>
            <button type="submit" name="fileSubmit">Valider</button>
        </form>
        <form method="post">
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
                    <td>';
                    foreach($leBareme as $bareme){
                        echo'
                        <input type="radio" id="'.$bareme['id'].'" name="radioNote['.$competence["id"].']" value="'.$bareme['points'].'"/>
                        <label for="'.$bareme['id'].'">'.$bareme['points'].'</label>';
                    };
                    '</td>';
                };
                echo'
                </tr>
            </tbody>
        </table>
        <button type="submit" name="noteSubmit">Valider les notes</button>
        </form>';
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