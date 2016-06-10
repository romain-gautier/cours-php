<?php


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

    while ($donnees_com = $recup_com->fetch()) { ?>
        De : <?php echo $donnees_com['auteur_com']; ?> <br>
        Le : <?php echo $donnees_com['date_com_fr']; ?> <br>
        Commentaire : <?php echo $donnees_com['contenu_com']; ?> <br>
    <?php }
    $recup_com->closeCursor();
    ?>
    <br>
