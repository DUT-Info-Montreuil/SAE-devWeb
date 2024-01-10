<?php
require_once 'Connexion.php';
class ModeleConnexions extends Connexion {

    private $connexion;

    function __construct(){
        $this->connexion = new Connexion();
        $this->connexion::initConnexion();
        $this->connexion->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function verifierUtilisateur($email, $password) {
        // Modification de la requête pour récupérer également l'id_joueur
        $query = $this->connexion->getBdd()->prepare('SELECT id_joueur, Nom_joueur, mot_de_passe, logo FROM joueur WHERE email = :email');
        $query->execute(array(':email' => $email));
    
        $result = $query->fetch(PDO::FETCH_ASSOC);
    
        if ($result && password_verify($password, $result['mot_de_passe'])) {
            // Retourne l'ID de l'utilisateur si le mot de passe est correct
            return array(true, $result['id_joueur'], $result['Nom_joueur'], $result['logo']);
        } else {
            // Retourne false, null et null si le mot de passe est incorrect
            return array(false, null, null);
        }
    }
    
    

    
}
?>
