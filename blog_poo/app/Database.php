<?php

class Database
{
    public function connection()
    {
        try {
            $connection = new PDO('mysql:host=localhost;dbname=projet_blog;charset=utf8', 'root', 'root');
            return $connection;
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage()); }
    }
}

