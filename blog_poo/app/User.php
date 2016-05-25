<?php
require_once 'Database.php';

class User {
    
    public function login() {

        $connection = new Database();
        $req = $connection->connection();

        if (isset($_POST['loginMembre'], $_POST['passMembre'])) {

            extract($_POST);

            // Vérification des identifiants
            $bdd = $req->prepare('SELECT id FROM membre WHERE loginMembre = :loginMembre AND passMembre = :passMembre');
            $bdd->execute(array(
                'loginMembre' => $loginMembre,
                'passMembre' => $passMembre));

            $resultat = $bdd->fetch();

            if (!$resultat) {
                echo 'Mauvais identifiant ou mot de passe !';
            } else {
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['loginMembre'] = $loginMembre;

                if ($loginMembre === 'Romain') {
                    header('location:index.php');
                } elseif ($loginMembre === 'Karim') {
                    header('location:modif.php');
                } elseif ($loginMembre === 'Guest') {
                    header('location:post.php');
                }

            }
        }
    }

    public function deco() {
        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();

        // Suppression des cookies de connexion automatique
        setcookie('loginMembre', '');
        setcookie('passMembre', '');
    }
    
}