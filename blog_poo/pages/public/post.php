<?php
require '../../app/Article.php';
require '../../app/Commentaire.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>

<?php
    $connection = new Database();
    $bdd = $connection->connection();

    $recup = $bdd->prepare("SELECT id, titre_article, contenu_article, auteur_article FROM articles WHERE id = :id" );
    $recup->execute(array("id" => $_GET["id"]));
    $donnees = $recup->fetch();

?>

<body class="container">

<h2 class="text-center"> <?php echo $donnees['titre_article']; ?> </h2>

<br>

<p>
    <?php echo $donnees['contenu_article']; ?>
</p>

<br>

<p>
    Auteur : <?php echo $donnees['auteur_article']; ?>
</p>

<hr>

<form action="post.php?id=<?php echo $_GET['id']; ?>" method="post">
    <div class="form-group">
        <label for="nomCommentaire">Votre nom</label>
        <input type="text" class="form-control" id="nomCommentaire" name="nomCommentaire" placeholder="Votre nom">
    </div>
    <div class="form-group">
        <label for="contenuCommentaire">Votre commentaire</label>
        <input type="text" class="form-control" id="contenuCommentaire" name="contenuCommentaire" placeholder="Votre commentaire">
    </div>
    <button type="submit" class="btn btn-success">Ajouter un commentaire</button> <a class="btn btn-primary" href="accueil.php" role="button">Retour à l'accueil</a>

    <?php
        $commentaire = new Commentaire();
        $insertCom = $commentaire->insertCom();
    ?>

    <hr>

    <h4>Commentaires :</h4>

    <?php
    $recup_com = $bdd->prepare('SELECT id, auteur_com, contenu_com, id_article, DATE_FORMAT(date_com, \'[%d/%m/%Y %H:%i:%s] \') AS date_com_fr FROM commentaires WHERE id_article = :id ORDER BY date_com_fr DESC' );
    $recup_com->execute(array("id" => $_GET["id"]));
    while ($donnees_com = $recup_com->fetch()) { ?>
        De : <?php echo $donnees_com['auteur_com']; ?> <br>
        Le : <?php echo $donnees_com['date_com_fr']; ?> <br>
        Commentaire : <?php echo $donnees_com['contenu_com']; ?> <br>
        <a href="modif_com.php?id=<?php echo $donnees_com['id']; ?>">Modifier le commentaire</a> <a href="supr_com.php?id=<?php echo $donnees_com['id']; ?>">Supprimer le commentaire</a> <br>
    <?php }
    $recup_com->closeCursor();
    ?>
    <br>


</body>
</html>
