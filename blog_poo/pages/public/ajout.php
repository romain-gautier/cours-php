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

<h2 class="text-center">Saisi d'un nouvel article</h2>

<p>
    Remplissez les champs suivants afin de saisir un nouvel article. <br>
    Tous les champs sont obligatoires. <br>
</p>

<form action="ajout.php" method="post">
    <div class="form-group">
        <label for="titreArticle">Titre de l'article</label>
        <input type="text" class="form-control" id="titreArticle" name="titre" placeholder="Titre de l'article">
    </div>
    <div class="form-group">
        <label for="contenuArticle">Contenu</label>
        <input type="text" class="form-control" id="contenuArticle" name="contenu" placeholder="Le contenu de l'article">
    </div>
    <div class="form-group">
        <label for="auteurArticle">Auteur</label>
        <input type="text" class="form-control" id="auteurArticle" name="auteur" value="<?php echo htmlspecialchars($_SESSION['loginMembre']); ?>">
    </div>
    <button type="submit" class="btn btn-success">Envoyer</button> <a class="btn btn-primary" href="accueil.php" role="button">Retour à l'accueil</a>

    <?php
    $article = new Article();
    $insertArticle = $article->insertArticle();
    ?>

</body>
</html>
