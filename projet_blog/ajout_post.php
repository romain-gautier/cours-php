<?php
header('Location: index.php');

  if (isset($_POST['titre'], $_POST['contenu'], $_POST['auteur'])) {

    extract($_POST);

    if (empty($titre) && !empty($contenu) && !empty($auteur)) {
      echo 'Vous devez saisir un titre.';
    }
    elseif (!empty($titre) && empty($contenu) && !empty($auteur)) {
      echo 'Vous devez saisir le contenu de votre article.';
    }
    elseif(!empty($titre) && !empty($contenu) && empty($auteur)) {
      echo "Vous devez saisir le nom de l'auteur";
    }
    elseif(empty($titre) && empty($contenu) && empty($auteur)) {
      echo "Vous devez saisir l'ensemble des champs";
    }
    else {
      try {
        $bdd = new PDO('mysql:host=localhost;dbname=projet_blog;charset=utf8', 'root', 'root'); }
      catch(Exception $e) {
        die('Erreur : '.$e->getMessage()); }

      $req = $bdd->prepare('INSERT INTO articles (titre_article, contenu_article, auteur_article, date_ajout) VALUES(?, ?, ?, NOW())');
      $req->execute(array($titre, $contenu, $auteur));
    }
  }
?>
