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
        // Utilisation d'une requête préparée avec des paramètres nommés
        $query = $this->connexion->getBdd()->prepare('SELECT id_joueur, mot_de_passe FROM joueur WHERE Nom_joueur = :login');
        $query->bindParam(':login', $login, PDO::PARAM_STR);
        $query->execute();

        // Vérification si l'utilisateur existe
        if ($query->rowCount() === 1) {
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // Vérification du mot de passe avec password_verify
            if (password_verify($password, $result['mot_de_passe'])) {
                // Retourne l'ID de l'utilisateur si le mot de passe est correct
                return array(true, $result['id_joueur']);
            }
        }

        // Retourne false et null si l'utilisateur n'existe pas ou le mot de passe est incorrect
        return array(false, null);
    }
}
?>
