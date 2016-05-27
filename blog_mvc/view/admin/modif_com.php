<?php

$commentaire = new Commentaire();
$modifCom = $commentaire->modifCom();

$connection = new Database();
$req = $connection->connection();

$recup = $req->prepare("SELECT id, auteur_com, contenu_com FROM commentaires WHERE id = :id" );
$recup->execute(array("id" => $_GET["id"]));
$donnees = $recup->fetch();
?>

<body class="container">

<h2 class="text-center">Modification de votre commentaire</h2>

<p>
    Tous les champs sont obligatoires. <br>
<form action="index.php?p=modif_com&id=<?php echo $_GET['id']; ?>" method="post">
    <div class="form-group">
        <label for="nomCommentaire">Votre nom</label>
        <input type="text" class="form-control" id="nomCommentaire" name="nomCommentaire" value="<?php echo htmlspecialchars($donnees["auteur_com"]); ?>">
    </div>
    <div class="form-group">
        <label for="contenuCommentaire">Votre commentaire</label>
        <input type="text" class="form-control" id="contenuCommentaire" name="contenuCommentaire" value="<?php echo htmlspecialchars($donnees["contenu_com"]); ?>">
    </div>
    <button type="submit" class="btn btn-success">Ajouter un commentaire</button> <a class="btn btn-primary" href="index.php?p=accueil" role="button">Retour à l'accueil</a>
</p>