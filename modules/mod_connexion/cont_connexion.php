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
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            list($verifie, $idUtilisateur, $login,  $logo) = $this->modele->verifierUtilisateur($email, $password);
            if ($verifie) {
                $_SESSION['idUtilisateur'] = $idUtilisateur;
                $_SESSION['profil_image'] = $logo;
                $_SESSION['login'] = $login;
                header('Location: index.php?module=debut');
                exit(); 
            } else {
                $this->vue->form_connexion();
            }
        } else {
            echo "Erreur lors de la connexion!";
        }
    }
    
    

    
    public function seDeconnecter() {
        // Détruire toutes les variables de session
        session_unset();
    
        // Détruire la session
        session_destroy();
    
        // Rediriger vers la page d'accueil
        header('Location: index.php?module=debut');
        exit();
    }
    

    public function exec() {
        switch ($this->action) {
            case 'formulaire':
                if (isset($_SESSION['email'])) {
                    $this->vue->form_connexion($_SESSION['email']);
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
