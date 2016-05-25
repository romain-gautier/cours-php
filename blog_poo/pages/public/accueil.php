<?php
session_start();
require '../../app/Article.php';
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
$connect = new Database();
$req = $connect->connection();
$reponse = $req->query('SELECT id, titre_article, contenu_article, auteur_article, DATE_FORMAT(date_ajout, \'[%d/%m/%Y %H:%i:%s] \') AS date_ajout_fr FROM articles ORDER BY ID DESC');
?>

<?php

    if(isset($_SESSION['loginMembre'])) {

        if ($_SESSION['loginMembre'] === 'Romain') {
            include '../accueil_admin.php';
         } elseif ($_SESSION['loginMembre'] === 'Karim') {
            include '../accueil_membre.php';
         } elseif ($_SESSION['loginMembre'] === 'Guest') {
            include '../accueil_guest.php';
        }
    } else {
        ?>
            <p>Bonjour cher visiteur, pour accéder aux fonctions du blog vous devez <a href="../../index.php">vous connecter.</a></p>
            <table class="table table-hover">
                <tr>
                    <th>Date</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Auteur</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php while ($donnees = $reponse->fetch()) { ?>
                    <tr>
                        <td class="text-left"> <?php echo htmlspecialchars($donnees['date_ajout_fr']); ?> </td>
                        <td class="text-left"> <?php echo htmlspecialchars($donnees['titre_article']); ?> </td>
                        <td class="text-left"> <?php echo htmlspecialchars($donnees['contenu_article']); ?> </td>
                        <td class="text-left"> <?php echo htmlspecialchars($donnees['auteur_article']); ?> </td>
                    </tr>
                <?php }
                $reponse->closeCursor();
                ?>
            </table>
<?php
    }   ?>


<a href="../deco.php">Déconnection</a>

</body>
</html>