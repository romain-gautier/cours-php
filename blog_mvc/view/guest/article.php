<?php
$connection = new Database();
$bdd = $connection->connection();

$recup = $bdd->prepare("SELECT id, titre_article, contenu_article, auteur_article FROM articles WHERE id = :id" );
$recup->execute(array("id" => $_GET["id"]));
$donnees = $recup->fetch();

?>

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

    <h4>Commentaires :</h4>
    <?php
    $recup_com = $bdd->prepare('SELECT id, auteur_com, contenu_com, id_article, DATE_FORMAT(date_com, \'[%d/%m/%Y %H:%i:%s] \') AS date_com_fr FROM commentaires WHERE id_article = :id ORDER BY date_com_fr DESC' );
    $recup_com->execute(array("id" => $_GET["id"]));
    while ($donnees_com = $recup_com->fetch()) { ?>
        De : <?php echo $donnees_com['auteur_com']; ?> <br>
        Le : <?php echo $donnees_com['date_com_fr']; ?> <br>
        Commentaire : <?php echo $donnees_com['contenu_com']; ?> <br>
    <?php }
    $recup_com->closeCursor();
    ?>
    <br>
