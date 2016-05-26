<?php

if ($_SESSION['loginMembre'] === 'Romain') {
    include 'admin/article.php';
} elseif ($_SESSION['loginMembre'] === 'Karim') {
    require 'membre/article.php';
} elseif ($_SESSION['loginMembre'] === 'Guest') {
    require 'guest/article.php';
}

