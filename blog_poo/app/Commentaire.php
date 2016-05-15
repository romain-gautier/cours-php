<?php

require_once 'Database.php';

class Commentaire
{

    public function insertCom()
    {
        if (isset($_POST['nomCommentaire'], $_POST['contenuCommentaire'])) {

            extract($_POST);

            if (!empty($nomCommentaire) && !empty($contenuCommentaire)) {
                
                $connection = new Database();
                $req = $connection->connection();

                $insert = $req->prepare('INSERT INTO commentaires (auteur_com, contenu_com, id_article, date_com) VALUES(?, ?, ?, NOW())');
                $insert->execute(array($nomCommentaire, $contenuCommentaire, $_GET['id']));
            }
        }
    }

    public function showCom()
    {
        $connection = new Database();
        $req = $connection->connection();

        $recup_com = $req->prepare('SELECT id, auteur_com, contenu_com, id_article, DATE_FORMAT(date_com, \'[%d/%m/%Y %H:%i:%s] \') AS date_com_fr FROM commentaires WHERE id_article = :id ORDER BY date_com_fr DESC' );
        $recup_com->execute(array("id" => $_GET["id"]));
        while ($donnees_com = $recup_com->fetch()) { ?>
            De : <?php echo $donnees_com['auteur_com']; ?> <br>
            Le : <?php echo $donnees_com['date_com_fr']; ?> <br>
            Commentaire : <?php echo $donnees_com['contenu_com']; ?> <br>
            <a href="modif_com.php?id=<?php echo $donnees_com['id']; ?>">Modifier le commentaire</a> <a href="supr_com.php?id=<?php echo $donnees_com['id']; ?>">Supprimer le commentaire</a> <br>
        <?php }
        $recup_com->closeCursor();
    }

    public function delCom()
    {
        if (isset($_GET['id'])) {
            $connection = new Database();
            $req = $connection->connection();

            $del = $req->prepare("DELETE FROM commentaires WHERE id = :id");
            $del->execute(array("id" => $_GET["id"]));
        }
    }

    public function modifCom()
    {
        if (!empty($_POST["nomCommentaire"]) && !empty($_POST["contenuCommentaire"]))
        {
            $connection = new Database();
            $req = $connection->connection();

            $modif = $req->prepare("UPDATE commentaires SET auteur_com = ?, contenu_com = ? WHERE id = ?");
            $modif->execute(array($_POST["nomCommentaire"], $_POST["contenuCommentaire"], $_GET["id"]));
            echo 'Message modifié';
        }
    }

}