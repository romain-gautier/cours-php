<?php
session_start();
require '../model/User.php';

$user = new User();
$login = $user->login();

?>