<?php
require_once 'Connexion.php';
class ModeleConnexions extends Connexion {

    private $connexion;

    function __construct(){
        $this->connexion = new Connexion();
        $this->connexion::initConnexion();
        $this->connexion->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function verifierUtilisateur($login, $password) {
        $query = $this->connexion->getBdd()->prepare('SELECT mot_de_passe FROM joueur WHERE Nom_joueur = :login');
        $query->execute(array(':login' => $login));

        $hashedPassword = $query->fetchColumn();

        if (password_verify($password, $hashedPassword)) {
            return true;
        } else {
            return false;
        }
    }
}
?>
