<?php

header('Location: index.php');
require 'app/Commentaire.php';

$commentaire = new Commentaire();
$delCom = $commentaire->delCom();