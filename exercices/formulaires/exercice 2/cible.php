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

      <p>
        <?php
        if ($_POST['temperature'] >= 0 && $_POST['temperature'] <= 12) {
          for ($i = 0; $i < $_POST['temperature']; $i++) {
            echo '<p style="color: blue">Il fait un peu frais</p>';
          }
        }
        elseif ($_POST['temperature'] >= 13 && $_POST['temperature'] <= 20) {
          for ($i = 0; $i < $_POST['temperature']; $i++) {
            echo '<p style="color: green">Il fait bon vivre</p>';
          }
        }
        elseif ($_POST['temperature'] >= 21 && $_POST['temperature'] <= 28) {
          for ($i = 0; $i < $_POST['temperature']; $i++) {
            echo '<p style="color: yellow">Il fait chaud dans le coin</p>';
          }
        }
        elseif ($_POST['temperature'] >= 29) {
          for ($i = 0; $i < $_POST['temperature']; $i++) {
            echo '<p style="color: red">On crame ici!</p>';
          }
        }
        else {
          echo '<p style="color: #EE82EE">On gèle!</p>';
        }
        ?>
      </p>

    </body>
</html>
