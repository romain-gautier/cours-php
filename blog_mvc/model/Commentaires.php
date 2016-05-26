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