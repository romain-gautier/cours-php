

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

<form action="index.php?p=article&id=<?php echo $_GET['id']; ?>" method="post">
    <div class="form-group">
        <label for="nomCommentaire">Votre nom</label>
        <input type="text" class="form-control" id="nomCommentaire" name="nomCommentaire" placeholder="Votre nom">
    </div>
    <div class="form-group">
        <label for="contenuCommentaire">Votre commentaire</label>
        <input type="text" class="form-control" id="contenuCommentaire" name="contenuCommentaire" placeholder="Votre commentaire">
    </div>
    <button type="submit" class="btn btn-success">Ajouter un commentaire</button> <a class="btn btn-primary" href="index.php?p=accueil" role="button">Retour à l'accueil</a>
    

    <hr>

    <h4>Commentaires :</h4>
    <?php
    while ($donnees_com = $recup_com->fetch()) { ?>
        De : <?php echo $donnees_com['auteur_com']; ?> <br>
        Le : <?php echo $donnees_com['date_com_fr']; ?> <br>
        Commentaire : <?php echo $donnees_com['contenu_com']; ?> <br>
        <a href="index.php?p=modif_com&id=<?php echo $donnees_com['id']; ?>">Modifier le commentaire</a> <a href="model/supr_com.php?id=<?php echo $donnees_com['id']; ?>">Supprimer le commentaire</a> <br>
    <?php }
    $recup_com->closeCursor();
    ?>
    <br>


