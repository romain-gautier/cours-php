<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Les variables</title>
    </head>

    <body>

    <p>
      Le but de l'exercice est d'afficher un tableau classé par ordre alphabétique <br>
      <?php
        $prenom = array('Jean', 'Marc', 'Joel', 'Brice', 'Mathieu');
        sort($prenom);
        foreach ($prenom as $element => $val)
        {
          echo 'Bonjour ' . $val . '<br />';
        }
      ?>
    </p>

    </body>
</html>
