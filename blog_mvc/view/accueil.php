<?php
if ($_SESSION['loginMembre'] === 'Romain') {
    include 'admin/accueil.php';
} elseif ($_SESSION['loginMembre'] === 'Karim') {
    require 'membre/accueil.php';
} elseif ($_SESSION['loginMembre'] === 'Guest') {
    require 'guest/accueil.php';
}