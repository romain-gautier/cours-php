<!DOCTYPE html>
<html>
  <head>
    <meta charset ="utf-8" />
    <link rel="stylesheet" href="style.css">
    <title>Mon super blog</title>
  </head>

  <body>

   <h1>Mon Super Blog</h1>

      <a href="index.php">Retour au blog</a>

    <div class="news">

      <?php

        $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $reponse = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(dateCreation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY ID');
        $reponse->execute(array($_GET['billet']));
        $donnees = $reponse->fetch();
        {
          ?>
            <h3><strong><?php echo htmlspecialchars($donnees['titre']); ?> le <?php echo htmlspecialchars($donnees['date_creation_fr']); ?> : </strong></h3>
            <p>
              <?php
              echo nl2br(($donnees['contenu']));
              ?>
            </p>
      </div>

      <?php
        }

      ?>

      <?php

      $req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(dateCommentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY dateCommentaire');
      $req->execute(array($_GET['billet']));

      while ($donnees = $req->fetch())
      {
      ?>
      <p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
      <p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
      <?php
      }
      ?>


  </body>

</html>
