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

    public function seConnecter() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            // Vérifiez le jeton CSRF
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                echo 'Erreur CSRF : Le formulaire a été compromis.';
                return; // Arrêtez le traitement ici
            }

            // Test de longueur minimale du mot de passe (au moins 10 caractères)
            if (strlen($password) < 10) {
                echo 'Mot de passe trop court (minimum 10 caractères).';
                return; // Arrêtez le traitement ici
            }

            // Test de complexité du mot de passe (au moins une majuscule, une minuscule, un chiffre et un caractère spécial)
            if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).*$/', $password)) {
                echo 'Mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.';
                return; // Arrêtez le traitement ici
            }

            list($verifie, $idUtilisateur) = $this->modele->verifierUtilisateur($login, $password);
            if ($verifie) {
                $_SESSION['login'] = $login;
                $_SESSION['idUtilisateur'] = $idUtilisateur;
                header('Location: index.php?module=debut');
                exit();
            } else {
                $this->vue->form_connexion();
            }
        } else {
            echo "Erreur lors de la connexion!";
        }
    }

    public function exec() {
        switch ($this->action) {
            case 'formulaire':
                if (isset($_SESSION['login'])) {
                    $this->vue->form_connexion($_SESSION['login']);
                } else {
                    $this->vue->form_connexion();
                }
                break;
            case 'connexion':
                $this->seConnecter();
                break;
            case 'deconnexion':
                $this->seDeconnecter();
                break;
        }
    }
}
?>
