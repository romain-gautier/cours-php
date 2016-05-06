<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Les variables</title>
    </head>

    <body>

    <p>
      Le but de l'exercice est d'afficher une variable <br>
      <?php
      $maVariable = 10;
      for ($i = 0; $i < $maVariable; $i++)
      {
        echo 'Vous avez choisi le nombre ' . $maVariable . '<br />';
      } ?>
    </p>

    </body>
</html>
