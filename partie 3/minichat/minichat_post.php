<?php

  header('Location: minichat.php');
  setcookie('pseudo', $_POST['pseudo'], time() + 24*3600, null, null, false, true);

  if (isset($_POST['pseudo'], $_POST['message'])) {

    extract($_POST);
    var_dump($pseudo);
    var_dump($message);

    if (empty($pseudo) && !empty($message)) {
      echo 'Vous devez saisir un pseudo.';
    }
    elseif (!empty($pseudo) && empty($message)) {
      echo 'Vous devez saisir un message.';
    }
    elseif(empty($pseudo) && empty($message)) {
      echo 'Vous devez saisir un pseudo et un message';
    }
    else {
      try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root'); }
      catch(Exception $e) {
          die('Erreur : '.$e->getMessage()); }

      $req = $bdd->prepare('INSERT INTO minichat (pseudo, message, date_message) VALUES(?, ?, NOW())');
      $req->execute(array($pseudo, $message));
    }
  }

?>
