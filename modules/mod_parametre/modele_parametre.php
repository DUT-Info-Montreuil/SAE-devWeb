<?php
require_once 'Connexion.php';

class ModeleParametre extends Connexion {

    private $connexion;
    
    function __construct() {
        $this->connexion = new Connexion();
        $this->connexion::initConnexion();
        $this->connexion->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function modifierParametre($login, $newPassword, $newEmail, $logo) {
        // Vous devriez utiliser le mot de passe et l'e-mail passés en paramètres plutôt que $mot_de_passe et $email.
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $query = $this->connexion->getBdd()->prepare('UPDATE joueur SET logo =?, mot_de_passe=?, email=? WHERE Nom_joueur=?');
        $result = $query->execute(array($logo, $hashedPassword, $newEmail, $login));

        if ($result) {
            echo 'Paramètres mis à jour avec succès !';
            header('Location: index.php?module=debut');
            exit(); 
        } 
    }

    public function verifierMotDePasse($login, $motDePasse) {
        $query = $this->connexion->getBdd()->prepare('SELECT mot_de_passe FROM joueur WHERE Nom_joueur = ?');
        $query->execute(array($login));
        $result = $query->fetch(PDO::FETCH_ASSOC);
    
        if ($result) {
            // Récupérez le mot de passe stocké dans la base de données
            $motDePasseStocke = $result['mot_de_passe'];
    
            // Vérifiez si le mot de passe soumis correspond au mot de passe stocké
            return password_verify($motDePasse, $motDePasseStocke);
        }
    
        // L'utilisateur n'a pas été trouvé dans la base de données
        return false;
    }
    
}



?>

