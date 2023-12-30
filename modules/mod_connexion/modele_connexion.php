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
        // Modification de la requête pour récupérer également l'email et l'id_joueur
        $query = $this->connexion->getBdd()->prepare('SELECT id_joueur, email, mot_de_passe FROM joueur WHERE Nom_joueur = :login');
        $query->execute(array(':login' => $login));
    
        $result = $query->fetch(PDO::FETCH_ASSOC);
    
        if ($result && password_verify($password, $result['mot_de_passe'])) {
            // Retourne l'email et l'ID de l'utilisateur si le mot de passe est correct
            return array(true, $result['email'], $result['id_joueur']);
        } else {
            // Retourne false, null et null si le mot de passe est incorrect
            return array(false, null, null);
        }
    }
    
    
    

    
}
?>
