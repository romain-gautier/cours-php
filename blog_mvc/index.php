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
} else {
    require '/Users/Romain/Documents/cours php/blog_mvc/controller/Controller.php';
}

$content = ob_get_clean();

require 'view/template/template.php';