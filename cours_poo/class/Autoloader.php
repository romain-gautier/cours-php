<?php

namespace Tutoriel;

class Autoloader {

    static function register() {

        spl_autoload_register(array(__CLASS__, 'autoload'));

    }

    static function autoload($class) {
        $class = str_replace('Tutoriel\\', '', $class);
        require 'class/' . $class . '.php';
    }

}