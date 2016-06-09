<?php
if ($_SESSION['loginMembre'] === 'Romain') {
    $article = new Article();
    $reponse = $article->getArticle();

    require '/Users/Romain/Documents/cours php/blog_mvc/view/admin/accueil.php';
}
