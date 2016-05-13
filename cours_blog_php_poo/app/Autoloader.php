<?php

namespace App;

class Autoloader {

    static function register() {

        spl_autoload_register(array(__CLASS__, 'autoload'));

    }

    static function autoload($class) {
        if (strpos($class, __NAMESPACE__ . '\\') === 0) {
            var_dump(__NAMESPACE__);
            var_dump($class);
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__ . '/' . $class . '.php';
        }

    }

}

