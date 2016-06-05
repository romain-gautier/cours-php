<?php
if ($_SESSION['loginMembre'] === 'Romain') {
    include '/Users/Romain/Documents/cours php/blog_mvc/view/admin/accueil.php';
} elseif ($_SESSION['loginMembre'] === 'Karim') {
    require '/Users/Romain/Documents/cours php/blog_mvc/view/membre/accueil.php';
} elseif ($_SESSION['loginMembre'] === 'Guest') {
    require '/Users/Romain/Documents/cours php/blog_mvc/view/guest/accueil.php';
}
