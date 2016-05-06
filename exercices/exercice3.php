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
      $maVariableNum1 = 30;
      $maVariableNum2 = 12; ?>
      <?php echo 'Voici le nombre 1 : ' . $maVariableNum1; ?> <br>
      <?php echo 'Voici le nombre 2 : ' . $maVariableNum2; ?> <br>
      <?php echo 'Addition : ' . ($maVariableNum1 + $maVariableNum2); ?> <br>
      <?php echo 'Soustraction : ' . ($maVariableNum1 - $maVariableNum2); ?> <br>
      <?php echo 'Multiplication : ' . ($maVariableNum1 * $maVariableNum2); ?> <br>
      <?php echo 'Division : ' . ($maVariableNum1 / $maVariableNum2); ?> <br>
      <?php echo 'Modulo : ' . ($maVariableNum1 % $maVariableNum2); ?>
    </p>

    </body>
</html>
