<?php
require_once 'Connexion.php';

class ModeleParametre extends Connexion {

    function __construct() {
        $this->connexion = new Connexion();
        $this->connexion::initConnexion();
        $this->connexion->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function modifierParametre($login, $newPassword, $newEmail) {
        // Vous devriez utiliser le mot de passe et l'e-mail passés en paramètres plutôt que $mot_de_passe et $email.
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $query = $this->connexion->getBdd()->prepare('UPDATE joueur SET mot_de_passe=?, email=? WHERE Nom_joueur=?');
        $result = $query->execute(array($hashedPassword, $newEmail, $login));

        if ($result) {
            echo 'Paramètres mis à jour avec succès !';
            header('Location: index.php?module=debut');
            exit();
        } else {
            echo 'Modification impossible !';
        }
    }
}



?>

