<?php
session_start();
require 'app/User.php';

$user = new User();
$login = $user->login();

?>