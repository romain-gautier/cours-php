<?php
session_start();
header('Location: ../index.php');
require '../app/User.php';

$deco = new User();
$logoff = $deco->deco();