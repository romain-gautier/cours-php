<?php
require 'Database.php';

class Article
{
    public function insertArticle()
    {
        if (isset($_POST['titre'], $_POST['contenu'], $_POST['auteur'])) {

            extract($_POST);

            if (!empty($titre) && !empty($contenu) && !empty($auteur)) {
                $connection = new Database();
                $req = $connection->prepare('INSERT INTO articles (titre_article, contenu_article, auteur_article, date_ajout) VALUES(?, ?, ?, NOW())');
                $req->execute(array($titre, $contenu, $auteur));
            }
        }
    }
}
?>