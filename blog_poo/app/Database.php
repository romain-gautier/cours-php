<?php

class Database
{

    const HOST = 'mysql:host=localhost;dbname=projet_blog;charset=utf8';
    const USER = 'root';
    const PASS = 'root';

    public function connection()
    {
        try {
            $connection = new PDO(self::HOST, self::USER, self::PASS);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage()); }
    }
}

