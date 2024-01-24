<?php

include('modele_connexion.php');
include('vue_connexion.php');

class ContConnexions {
    private $modele;
    private $vue;
    private $action;

    public function __construct() {
        $this->modele = new ModeleConnexions();
        $this->vue = new VueConnexions();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'formulaire';
    }

    public function exec() {
        switch ($this->action) {
            case 'formulaire':
                $this->vue->form_connexion();
                break;
            case 'connexion':
                $this->seConnecter();
                break;
            case 'deconnexion':
                $this->seDeconnecter();
                break;
            default:
                // Gérer les autres actions ou rediriger vers une page d'erreur
                break;
        }
    }

    private function seConnecter() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && $this->isFormValid()) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            list($verifie, $idUtilisateur) = $this->modele->verifierUtilisateur($login, $password);
            if ($verifie) {
                $_SESSION['login'] = $login;
                $_SESSION['idUtilisateur'] = $idUtilisateur;
                header('Location: index.php?module=debut');
                exit();
            } else {
                $this->vue->form_connexion('Identifiants incorrects.');
            }
        } else {
            $this->vue->form_connexion();
        }
    }

    private function isFormValid() {
        if (!isset($_POST['login'], $_POST['password'])) {
            echo "Données de formulaire incomplètes.";
            return false;
        }

        if (strlen($_POST['password']) < 10) {
            echo 'Mot de passe trop court (minimum 10 caractères).';
            return false;
        }

        if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).*$/', $_POST['password'])) {
            echo 'Mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.';
            return false;
        }

        return true;
    }

    private function seDeconnecter() {
        // Votre logique de déconnexion ici
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
?>
