<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    </head>

    <?php

        /* var_dump($_POST["titre"]);
        var_dump($_POST["contenu"]);
        var_dump($_POST["auteur"]); */

        try {
          $bdd = new PDO('mysql:host=localhost;dbname=projet_blog;charset=utf8', 'root', 'root'); }
        catch(Exception $e) {
          die('Erreur : '.$e->getMessage()); }

      if (!empty($_POST["titre"]) && !empty($_POST["contenu"]) && !empty($_POST["auteur"])) {
          $req = $bdd->prepare("UPDATE articles SET titre_article = ?, contenu_article = ?, auteur_article = ? WHERE id = ?");
          $req->execute(array($_POST["titre"], $_POST["contenu"], $_POST["auteur"], $_GET["id"]));
          echo 'Message modifié';
          header('Location: index.php');
        }

      $recup = $bdd->prepare("SELECT id, titre_article, contenu_article, auteur_article FROM articles WHERE id = :id" );
      $recup->execute(array("id" => $_GET["id"]));
      $donnees = $recup->fetch();



     ?>

    <body class="container">

      <h2 class="text-center">Modification d'article</h2>

      <p>
        Vous pouvez modifier le titre, le contenu et l'auteur de l'article. <br>
        Tous les champs sont obligatoires. <br>
      </p>

      <form action=<?php echo "'modif.php?id=" . $_GET["id"] . "'"?> method="post">
        <div class="form-group">
          <label for="titreArticle">Titre de l'article</label>
          <input type="text" class="form-control" id="titreArticle" name="titre" value="<?php echo htmlspecialchars($donnees["titre_article"]); ?>" >
        </div>
        <div class="form-group">
          <label for="contenuArticle">Contenu</label>
          <input type="text" class="form-control" id="contenuArticle" name="contenu" value="<?php echo htmlspecialchars($donnees["contenu_article"]); ?>" >
        </div>
        <div class="form-group">
          <label for="auteurArticle">Auteur</label>
          <input type="text" class="form-control" id="auteurArticle" name="auteur" value="<?php echo htmlspecialchars($donnees["auteur_article"]); ?> >
        </div>
        <button type="submit" class="btn btn-success">Mettre à jour</button> <a class="btn btn-primary" href="index.php" role="button">Retour à l'accueil</a>

    </body>
</html>
