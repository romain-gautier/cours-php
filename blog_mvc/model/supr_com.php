<?php

header('Location: ../index.php?p=accueil');
require 'Commentaires.php';

$commentaire = new Commentaire();
$delCom = $commentaire->delCom();