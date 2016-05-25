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
    <?php while ($donnees = $reponse->fetch()) { ?>
        <tr>
            <td class="text-left"> <?php echo htmlspecialchars($donnees['date_ajout_fr']); ?> </td>
            <td class="text-left"> <?php echo htmlspecialchars($donnees['titre_article']); ?> </td>
            <td class="text-left"> <?php echo htmlspecialchars($donnees['contenu_article']); ?> </td>
            <td class="text-left"> <?php echo htmlspecialchars($donnees['auteur_article']); ?> </td>
            <td class="text-left"> <?php echo "<a href='post.php?id=" . htmlspecialchars($donnees["id"]) . "'> Afficher </a>"; ?> </td>
        </tr>
    <?php }
    $reponse->closeCursor();
    ?>
</table>