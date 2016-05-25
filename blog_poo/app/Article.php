<?php
require_once 'Database.php';

class Article
{
    public function insertArticle()
    {
        if (isset($_POST['titre'], $_POST['contenu'], $_POST['auteur'])) {

            extract($_POST);

            if (!empty($titre) && !empty($contenu) && !empty($auteur)) {
                $connection = new Database();
                $req = $connection->connection();
                $insert = $req->prepare('INSERT INTO articles (titre_article, contenu_article, auteur_article, date_ajout) VALUES(?, ?, ?, NOW())');
                $insert->execute(array($titre, $contenu, $auteur));
                echo 'article ajouté';
            }
        }
    }

    public function modifArticle()
    {

        $connection = new Database();
        $req = $connection->connection();

        if (!empty($_POST["titre"]) && !empty($_POST["contenu"]) && !empty($_POST["auteur"])) {
            $modif = $req->prepare("UPDATE articles SET titre_article = ?, contenu_article = ?, auteur_article = ? WHERE id = ?");
            $modif->execute(array($_POST["titre"], $_POST["contenu"], $_POST["auteur"], $_GET["id"]));
            echo 'Message modifié';
        }

    }

    public function delArticle()
    {
        if (isset($_GET['id'])) {

            $connection = new Database();
            $req = $connection->connection();
            $del_com = $req->prepare('DELETE FROM commentaires WHERE id_article = :id');
            $del_com->execute(array("id" => $_GET["id"]));
            $del = $req->prepare("DELETE FROM articles WHERE id = :id");
            $del->execute(array("id" => $_GET["id"]));
        }
    }

    public function showArticle()
    {
        $connection = new Database();
        $bdd = $connection->connection();

        $recup = $bdd->prepare("SELECT id, titre_article, contenu_article, auteur_article FROM articles WHERE id = :id" );
        $recup->execute(array("id" => $_GET["id"]));
        $donnees = $recup->fetch();

        ?>

        <body class="container">

    <h2 class="text-center"> <?php echo $donnees['titre_article']; ?> </h2>

    <br>

    <p>
        <?php echo $donnees['contenu_article']; ?>
    </p>

    <br>

    <p>
        Auteur : <?php echo $donnees['auteur_article']; ?>
    </p> <?php
        
    }
    

}

?>