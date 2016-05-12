<?php
header('Location: index.php');
require 'app/Article.php';

$article = new Article();
$delArticle = $article->delArticle();

