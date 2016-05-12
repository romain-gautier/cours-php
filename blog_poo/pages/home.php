<?php

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
}

ob_start();

if ($p === 'index') {
    require '../index.php';
} elseif ($p === 'ajout') {
    require '../ajout.php';
}

$content = ob_get_clean();

require 'template.php';