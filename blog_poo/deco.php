<?php
session_start();
header('Location: login.php');
require 'app/User.php';

$deco = new User();
$logoff = $deco->deco();