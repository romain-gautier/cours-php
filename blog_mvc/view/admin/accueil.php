<h2 class="text-center">Bienvenue sur mon blog</h2>
<p>
    Vous trouverez ci-dessous les derniers articles postés sur le blog. <br>
    <a class="btn btn-primary center-block" href="index.php?p=ajout" role="button">Ajouter un nouvel article</a>
</p>
    <table class="table table-hover">
        <tr>
            <th>Date</th>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Auteur</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <?php
        var_dump($reponse);
        while ($donnees = $reponse->fetch()) { ?>
            <tr>
                <td class="text-left"> <?php echo htmlspecialchars($donnees['date_ajout_fr']); ?> </td>
                <td class="text-left"> <?php echo htmlspecialchars($donnees['titre_article']); ?> </td>
                <td class="text-left"> <?php echo htmlspecialchars($donnees['contenu_article']); ?> </td>
                <td class="text-left"> <?php echo htmlspecialchars($donnees['auteur_article']); ?> </td>
                <td class="text-left"> <?php echo "<a href='index.php?p=article&id=" . htmlspecialchars($donnees["id"]) . "'> Afficher </a>"; ?> </td>
                <td class="text-left"> <?php echo "<a href='index.php?p=modif&id=" . htmlspecialchars($donnees["id"]) . "'> Modifier </a>"; ?> </td>
                <td class="text-left"> <?php echo "<a href='model/supprimer.php?id=" . htmlspecialchars($donnees["id"]) . "'> Supprimer </a>"; ?> </td>
            </tr>
        <?php }
        $reponse->closeCursor();
        ?>
    </table>


<a href="controller/logoff.php">Déconnection</a>
