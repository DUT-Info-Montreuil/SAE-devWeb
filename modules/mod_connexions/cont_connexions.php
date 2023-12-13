<?php
include('modele_connexions.php');
include('vue_connexions.php');

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

            if ($this->modele->verifierUtilisateur($login, $password)) {
                $_SESSION['login'] = $login;
                $idJoueur = $this->modele->getIdJoueur($login);
    
                // Enregistrez l'ID du joueur dans la session
                $_SESSION['id_joueur'] = $idJoueur;
                //echo 'Connexion réussie!';
                header('Location: index.php?module=debut');
                exit(); 
               // echo '<p><a href="index.php">Retour à la page d\'accueil</a></p>';
            } else {
                echo 'Identifiant ou mot de passe incorrect' . '<br>';
                $this->vue->form_connexion();
            }
        } else {
            echo "Erreur lors de la connexion!";
        }
    }

    
    public function seDeconnecter() {
        unset($_SESSION['login']);
        header('Location: index.php?module=debut');
        exit();

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
