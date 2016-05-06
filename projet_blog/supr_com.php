<?php

  header('Location: index.php');

  if (isset($_GET['id'])) {
    try {
      $bdd = new PDO('mysql:host=localhost;dbname=projet_blog;charset=utf8', 'root', 'root'); }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage()); }

    $del = $bdd->prepare("DELETE FROM commentaires WHERE id = :id");
    $del->execute(array("id" => $_GET["id"]));
  }

 ?>
