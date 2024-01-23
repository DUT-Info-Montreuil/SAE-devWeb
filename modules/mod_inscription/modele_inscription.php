<?php
require_once 'Connexion.php';
class ModeleInscriptions extends Connexion {

    private $connexion;

    function __construct(){
        $this->connexion = new Connexion();
        $this->connexion::initConnexion();
        $this->connexion->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function ajoutInscription($login, $password, $email) {
        try {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $query = Connexion::getBdd()->prepare('INSERT INTO joueur (Nom_joueur, mot_de_passe, email) VALUES (:login, :hashedPassword, :email)');

            $query->execute([
                'login' => $login,
                'hashedPassword' => $hashedPassword,
                'email' => $email
            ]);

            if ($query->rowCount() > 0) {
                // L'insertion a réussi
                echo 'Inscription réussie.';
                header('Location: index.php?module=connexion');
                exit();
            } else {
                // L'insertion a échoué
                echo 'Erreur lors de l\'inscription.';
            }
        } catch (PDOException $e) {
            echo 'Erreur de base de données : ' . $e->getMessage();
        }
    }
}
