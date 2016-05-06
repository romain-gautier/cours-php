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
      $maVariable = 13;
      if ($maVariable >= 0 && $maVariable <= 5)
      {
        echo 'je commence juste mon apprentissage de PHP';
      }
      elseif ($maVariable >= 6 && $maVariable <= 10)
      {
        echo 'je commence à bien comprendre les bases de PHP';
      }
      elseif ($maVariable >= 11 && $maVariable <= 15)
      {
        echo ' je connais bien PHP et je suis à un niveau avancé';
      }
      elseif ($maVariable > 15 && $maVariable <= 20)
      {
        echo ' je connais bien PHP et je suis un expert en php';
      }
      else
      {
        echo 'Le nombre doit être compris entre 0 et 20';
      }
      ?>
    </p>

    </body>
</html>
