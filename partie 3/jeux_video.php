<?php
  $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  $reponse = $bdd->query('SELECT console, nom, prix FROM jeux_video WHERE console="NES" OR console="PC" ORDER BY prix DESC LIMIT 5');
  while ($donnees = $reponse->fetch())
  {
    echo '<p>' . $donnees['console'] . ' - ' . $donnees['nom'] . ' - ' . $donnees['prix'] . '€</p>';
  }
 ?>
