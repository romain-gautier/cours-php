<?php
    header('Location: index.php');

      if (isset($_POST['nomCommentaire'], $_POST['contenuCommentaire'])) {

        extract($_POST);

        if (!empty($nomCommentaire) && !empty($contenuCommentaire)) {
          try {
            $bdd = new PDO('mysql:host=localhost;dbname=projet_blog;charset=utf8', 'root', 'root'); }
          catch(Exception $e) {
            die('Erreur : '.$e->getMessage()); }

          $req = $bdd->prepare('INSERT INTO commentaires (auteur_com, contenu_com, id_article, date_com) VALUES(?, ?, ?, NOW())');
          $req->execute(array($nomCommentaire, $contenuCommentaire, $_GET['id']));
        }
      }
?>
