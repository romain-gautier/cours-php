<?php
header('Location: ../index.php?p=accueil');
require 'Articles.php';

$article = new Article();
$delArticle = $article->delArticle();