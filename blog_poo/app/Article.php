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

    public function afficheArticle()
    {
        $connect = new Database();
        $req = $connect->connection();
        $reponse = $req->query('SELECT id, titre_article, contenu_article, auteur_article, DATE_FORMAT(date_ajout, \'[%d/%m/%Y %H:%i:%s] \') AS date_ajout_fr FROM articles ORDER BY ID DESC');
        ?>
        <table class="table table-hover">
        <?php while ($donnees = $reponse->fetch()) { ?>
        <tr>
            <td class="text-left"> <?php echo htmlspecialchars($donnees['date_ajout_fr']); ?> </td>
            <td class="text-left"> <?php echo htmlspecialchars($donnees['titre_article']); ?> </td>
            <td class="text-left"> <?php echo htmlspecialchars($donnees['contenu_article']); ?> </td>
            <td class="text-left"> <?php echo htmlspecialchars($donnees['auteur_article']); ?> </td>
            <td class="text-left"> <?php echo "<a href='modif.php?id=" . htmlspecialchars($donnees["id"]) . "'> Modifier </a>"; ?> </td>
            <td class="text-left"> <?php echo "<a href='supprimer.php?id=" . htmlspecialchars($donnees["id"]) . "'> Supprimer </a>"; ?> </td>
            <td class="text-left"> <?php echo "<a href='post.php?id=" . htmlspecialchars($donnees["id"]) . "'> Afficher </a>"; ?> </td>
        </tr>
        </table>
    <?php  }
    
    }

}

?>