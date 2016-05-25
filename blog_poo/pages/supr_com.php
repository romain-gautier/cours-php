<?php

header('Location: public/accueil.php');
require '../app/Commentaire.php';

$commentaire = new Commentaire();
$delCom = $commentaire->delCom();