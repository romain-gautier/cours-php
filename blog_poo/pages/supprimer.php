<?php
header('Location: public/accueil.php');
require '../app/Article.php';

$article = new Article();
$delArticle = $article->delArticle();

