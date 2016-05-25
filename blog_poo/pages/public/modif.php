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

<?php

$article = new Article();
$modifArticle = $article->modifArticle();

$connection = new Database();
$req = $connection->connection();

$recup = $req->prepare("SELECT id, titre_article, contenu_article, auteur_article FROM articles WHERE id = :id" );
$recup->execute(array("id" => $_GET["id"]));
$donnees = $recup->fetch();

?>

<body class="container">

<h2 class="text-center">Modification d'article</h2>

<p>
    Vous pouvez modifier le titre, le contenu et l'auteur de l'article. <br>
    Tous les champs sont obligatoires. <br>
</p>

<form method="post" action=<?php echo "'modif.php?id=" . $_GET["id"] . "'"?>>
    <div class="form-group">
        <label for="titreArticle">Titre de l'article</label>
        <input type="text" class="form-control" id="titreArticle" name="titre" value="<?php echo htmlspecialchars($donnees["titre_article"]); ?>" >
    </div>
    <div class="form-group">
        <label for="contenuArticle">Contenu</label>
        <input type="text" class="form-control" id="contenuArticle" name="contenu" value="<?php echo htmlspecialchars($donnees["contenu_article"]); ?>" >
    </div>
    <div class="form-group">
        <label for="auteurArticle">Auteur</label>
        <input type="text" class="form-control" id="auteurArticle" name="auteur" value="<?php echo htmlspecialchars($donnees["auteur_article"]); ?>" >
        </div>
        <button type="submit" class="btn btn-success">Mettre à jour</button> <a class="btn btn-primary" href="accueil.php" role="button">Retour à l'accueil</a>

</body>
</html>
