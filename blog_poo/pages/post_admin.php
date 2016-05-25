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