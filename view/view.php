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
        <label for=""> Importez votre liste d\'élèves </label> 
        <input type="file" />
        <input type="button" value="Parcourir"/>

        <input type="button" value="Valider la saisie"/>
        <input type="button" value="Exporter en PDF"/>';
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