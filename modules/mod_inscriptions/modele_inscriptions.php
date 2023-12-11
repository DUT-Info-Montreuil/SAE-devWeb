<?php
require_once 'Connexion.php';
class ModeleInscriptions extends Connexion {

    private $connexion;

    function __construct(){
        $this->connexion = new Connexion();
        $this->connexion::initConnexion();
        $this->connexion->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function ajoutInscription($login, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = $this->connexion->getBdd()->prepare('INSERT INTO joueur (Nom_joueur, mot_de_passe) VALUES (:login, :password)');
        $result = $query->execute(array(':login' => $login, ':password' => $hashedPassword));
        
        if ($result) {
            echo 'Vous êtes désormais inscrit !';
        } else {
            echo 'Insertion impossible !';
        }
    }
}

?>
