<?php

if ($p === 'accueil') {
    $article = new Article();
    $reponse = $article->getArticle();

    if ($_SESSION['loginMembre'] === 'Romain') {
        require '/Users/Romain/Documents/cours php/blog_mvc/view/admin/accueil.php';
    } elseif ($_SESSION['loginMembre'] === 'Karim') {
        require '/Users/Romain/Documents/cours php/blog_mvc/view/membre/accueil.php';
    } elseif ($_SESSION['loginMembre'] === 'Guest') {
        require '/Users/Romain/Documents/cours php/blog_mvc/view/guest/accueil.php';
    }
    
} elseif ($p === 'article') {
    $commentaire = new Commentaire();
    $insertCom = $commentaire->insertCom();

    $connection = new Database();
    $bdd = $connection->connection();

    $recup = $bdd->prepare("SELECT id, titre_article, contenu_article, auteur_article FROM articles WHERE id = :id" );
    $recup->execute(array("id" => $_GET["id"]));
    $donnees = $recup->fetch();

    $recup_com = $bdd->prepare('SELECT id, auteur_com, contenu_com, id_article, DATE_FORMAT(date_com, \'[%d/%m/%Y %H:%i:%s] \') AS date_com_fr FROM commentaires WHERE id_article = :id ORDER BY date_com_fr DESC' );
    $recup_com->execute(array("id" => $_GET["id"]));

    if ($_SESSION['loginMembre'] === 'Romain') {
        include '/Users/Romain/Documents/cours php/blog_mvc/view/admin/article.php';
    } elseif ($_SESSION['loginMembre'] === 'Karim') {
        require '/Users/Romain/Documents/cours php/blog_mvc/view/membre/article.php';
    } elseif ($_SESSION['loginMembre'] === 'Guest') {
        require '/Users/Romain/Documents/cours php/blog_mvc/view/guest/article.php';
    }
    
} elseif ($p === 'modif') {
    $article = new Article();
    $modifArticle = $article->modifArticle();

    $connection = new Database();
    $req = $connection->connection();

    $recup = $req->prepare("SELECT id, titre_article, contenu_article, auteur_article FROM articles WHERE id = :id" );
    $recup->execute(array("id" => $_GET["id"]));
    $donnees = $recup->fetch();
    require '/Users/Romain/Documents/cours php/blog_mvc/view/admin/modif_article.php';
    
} elseif ($p === 'modif_com') {
    $commentaire = new Commentaire();
    $modifCom = $commentaire->modifCom();

    $connection = new Database();
    $req = $connection->connection();

    $recup = $req->prepare("SELECT id, auteur_com, contenu_com FROM commentaires WHERE id = :id" );
    $recup->execute(array("id" => $_GET["id"]));
    $donnees = $recup->fetch();
    require '/Users/Romain/Documents/cours php/blog_mvc/view/admin/modif_com.php';
    
} elseif ($p === 'ajout') {
    $article = new Article();
    $insertArticle = $article->insertArticle();
    require '/Users/Romain/Documents/cours php/blog_mvc/view/ajout.php';
}