<?php

if ($_SESSION['loginMembre'] === 'Romain') {
    include '/Users/Romain/Documents/cours php/blog_mvc/view/admin/article.php';
} elseif ($_SESSION['loginMembre'] === 'Karim') {
    require '/Users/Romain/Documents/cours php/blog_mvc/view/membre/article.php';
} elseif ($_SESSION['loginMembre'] === 'Guest') {
    require '/Users/Romain/Documents/cours php/blog_mvc/view/guest/article.php';
}

