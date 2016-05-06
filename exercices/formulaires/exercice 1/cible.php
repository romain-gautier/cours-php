<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Les formulaires</title>
    </head>

    <body>

      <p>
        Bonjour!
      </p>

      <p>
        Aujourd'hui à <?php echo htmlspecialchars($_POST['ville']); ?> il fait <?php echo htmlspecialchars($_POST['temperature']) ?>°C. <br>
        Bonne journée!
      </p>

    </body>
</html>
