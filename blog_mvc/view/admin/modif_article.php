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

<form method="post" action=<?php echo "'index.php?p=modif&id=" . $_GET["id"] . "'"?>>
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
    <button type="submit" class="btn btn-success">Mettre à jour</button> <a class="btn btn-primary" href="index.php?p=accueil" role="button">Retour à l'accueil</a>