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
    public function accueil(){
        $this->entete();
        echo'
        <form method="post" enctype="multipart/form-data">
            <label for=""> Importez votre liste d\'élèves </label> 
            <input type="file" name="excelFile"/>
            <button type="submit" name="fileSubmit">Valider</button>
        </form>
        <table border =1>
            <tr>
                <td>id</td>
                <td>Nom</td>
                <td>Prenom</td>
                <td>idClasse</td>
            </tr>
            <tr>
                <td>?</td>
                <td>?</td>
                <td>?</td>
                <td>?</td>
            </tr>';
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