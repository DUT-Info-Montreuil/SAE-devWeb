<?php

class Connexion {

    private static $bdd;

    public static function initConnexion() {
            $dsn = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw20167;charset=utf8";
            $utilisateur = "dutinfopw20167";
            $motDePasse = "dysesyjy";

        try {
            self::$bdd = new PDO($dsn, $utilisateur, $motDePasse);
        } catch (PDOException $e) {
            die("J'ai fais de mon mieux, mais tu ne veux pas parler avec Moi :  " . $e->getMessage());
        }
    }

    public static function getBdd(){
        return self::$bdd;
    }
    
}

?>