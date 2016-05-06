<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link href="minichat.css" rel="stylesheet" />
        <title>Mini-chat</title>
    </head>

    <body>

      <h1>Bienvenue dans le <strong>mini-chat</strong> !</h1>

      <div class="formulaire">

        <form action="minichat_post.php" method="post">
          <p><label for="pseudo">Pseudo : </label><input type="text" name="pseudo" id="pseudo" placeholder="Insérez votre pseudo" required size="20" value="<?php if (isset ($_COOKIE['pseudo'])) echo $_COOKIE['pseudo']; ?>" /></p>
          <p><label for="message">Message : </label><input type="text" name="message" id="message"  placeholder="Insérez votre message ici" required size="50" /></p>
          <input type="submit" value="Envoyer" />
        </form>
        <a href="minichat.php" title="Cliquez pour voir les nouveaux messages !">Rafraîchir</a>

      </div>

      <div class="messages">

        <?php
          try {
            $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root'); }
          catch(Exception $e) {
              die('Erreur : '.$e->getMessage()); }
          $reponse = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_message, \'[%d/%m/%Y %H:%i:%s] \') AS date_message_fr FROM minichat ORDER BY ID DESC LIMIT 0, 10');
          while ($donnees = $reponse->fetch()) {
            echo $donnees['date_message_fr'] . $donnees['pseudo'] . ' : ' . $donnees['message'] . '<br />'; }
          $reponse->closeCursor();
        ?>

      </div>

    </body>
</html>
