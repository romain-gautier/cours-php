<?php

session_start();
require 'model/Articles.php';
require 'model/Commentaires.php';
require 'model/User.php';
require_once 'model/Database.php';

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'login';
}

ob_start();

if ($p === 'login') {
    require 'view/login.php';
} elseif ($p === 'accueil') {
    require 'controller/accueil.php';
} elseif ($p === 'article') {
    require 'controller/article.php';
} elseif ($p === 'modif') {
    require 'view/admin/modif_article.php';
} elseif ($p === 'modif_com') {
    require 'view/admin/modif_com.php';
} elseif ($p === 'ajout') {
    require 'controller/ajout.php';
}

$content = ob_get_clean();

require 'view/template/template.php';