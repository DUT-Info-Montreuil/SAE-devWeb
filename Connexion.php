<?php

class Connexion {

    private static $bdd;

    public static function initConnexion(){
<<<<<<< HEAD:connexion.php
        $serveur = 'localhost'; 
        $utilisateur = 'root'; 
        $motDePasse = 'root'; 
=======
        $serveur = 'localhost';
        $utilisateur = 'root';
        $motDePasse = 'toto';
>>>>>>> f3006a7f2adb776d9cf9ec5d85926bf329a33afa:Connexion.php
        $baseDeDonnees = 'interstellarhavoc';

        try {
            self::$bdd = new PDO("mysql:host=$serveur;dbname=$baseDeDonnees", $utilisateur, $motDePasse);
        }catch (PDOException $e) {
            die("Erreur de connexion ! " . $e->getMessage());
        }
    }

    public function getBdd(){
        return self::$bdd;
    }
}

?>
