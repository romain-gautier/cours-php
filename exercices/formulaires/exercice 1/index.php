<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Les formulaires</title>
    </head>

    <body>

      <p>
        Bonjour, <br>
        Veuillez saisir votre ville et la température dans le formulaire ci-dessous : <br>
      </p>

      <form action="cible.php" method="post">
        <p>
          <input type="text" name="ville" placeholder="Votre ville">
          <input type="number" name="temperature" placeholder="la température">
          <input type="submit" value="valider">
        </p>
      </form>

    </body>
</html>
