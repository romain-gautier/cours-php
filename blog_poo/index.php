<?php
require 'app/Database.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>

<body class="container">

<h2 class="text-center">Bienvenue sur mon blog</h2>
<p>
    Vous trouverez ci-dessous les derniers articles postés sur le blog. <br>
    <a class="btn btn-primary center-block" href="ajout.php" role="button">Ajouter un nouvel article</a>
</p>

<?php
/* try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_blog;charset=utf8', 'root', 'root'); }
catch(Exception $e) {
    die('Erreur : '.$e->getMessage()); } */
    $connection = new Database();
    $reponse = $connection->query('SELECT id, titre_article, contenu_article, auteur_article, DATE_FORMAT(date_ajout, \'[%d/%m/%Y %H:%i:%s] \') AS date_ajout_fr FROM articles ORDER BY ID DESC');
?>
<table class="table table-hover">
    <?php while ($donnees = $reponse->fetch()) { ?>
        <tr>
            <td class="text-left"> <?php echo htmlspecialchars($donnees['date_ajout_fr']); ?> </td>
            <td class="text-left"> <?php echo htmlspecialchars($donnees['titre_article']); ?> </td>
            <td class="text-left"> <?php echo htmlspecialchars($donnees['contenu_article']); ?> </td>
            <td class="text-left"> <?php echo htmlspecialchars($donnees['auteur_article']); ?> </td>
            <td class="text-left"> <?php echo "<a href='modif.php?id=" . htmlspecialchars($donnees["id"]) . "'> Modifier </a>"; ?> </td>
            <td class="text-left"> <?php echo "<a href='supprimer.php?id=" . htmlspecialchars($donnees["id"]) . "'> Supprimer </a>"; ?> </td>
            <td class="text-left"> <?php echo "<a href='post.php?id=" . htmlspecialchars($donnees["id"]) . "'> Afficher </a>"; ?> </td>
            <td> <?php $nbCom = $bdd->prepare('SELECT COUNT(id_article) FROM commentaires where id_article = ?');
                $nbCom->execute([$donnees['id']]);
                while ($data = $nbCom->fetch()) {
                    echo $data; } ?> </td>
        </tr>
    <?php  }

    $reponse->closeCursor();
    ?>
</table>


</body>
</html>

<?php
?>
