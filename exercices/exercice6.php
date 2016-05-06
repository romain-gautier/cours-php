<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Les variables</title>
    </head>

    <body>

    <p>
      Le but de l'exercice est d'afficher un tableau <br>
      <?php
        $prenom = array('Jean', 'Marc', 'Joel', 'Brice', 'Mathieu');
        foreach ($prenom as $element)
        {
          echo 'Bonjour ' . $element . '<br />';
        }
      ?>
    </p>

    </body>
</html>
