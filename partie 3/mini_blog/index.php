<!DOCTYPE html>
<html>
  <head>
    <meta charset ="utf-8" />
    <link rel="stylesheet" href="style.css">
    <title>Mon super blog</title>
  </head>

  <body>

   <h1>Mon Super Blog</h1>

    <div class="news">
      <?php

        $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $reponse = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(dateCreation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY id');
        while ($donnees = $reponse->fetch())
        {
          ?>
            <h3><strong><?php echo htmlspecialchars($donnees['titre']); ?> le <?php echo htmlspecialchars($donnees['date_creation_fr']); ?> : </strong></h3>
            <p>
              <?php
              echo nl2br(($donnees['contenu']));
              ?>
            </p>
            <a href="commentaire.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a>
      <?php
        }

      ?>
    </div>

  </body>

</html>
