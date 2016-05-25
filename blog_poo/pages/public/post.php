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
    $article = new Article();
    $show = $article->showArticle();
?>

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
        $showCom = $commentaire->showCom();
    ?>
    <br>


</body>
</html>
