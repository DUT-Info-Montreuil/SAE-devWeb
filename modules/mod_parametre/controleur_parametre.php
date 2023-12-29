<?php
include('modele_parametre.php');
include('vue_parametre.php');

class ControleurParametre {
    
    private $modele;
    private $vue;
    private $action;

    public function __construct() {
        $this->modele = new ModeleParametre();
        $this->vue = new VueParametre();
                $this->action = isset($_GET['action']) ? $_GET['action'] : 'parametre';  
    
    }

    public function modifier() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['password']) && isset($_POST['email'])) {
            // Récupérez les données du formulaire POST (nouveau mot de passe et nouvel email).
            $newPassword = $_POST['password'];
            $newEmail = $_POST['email'];
            
             // Récupérez le nom d'utilisateur de la session.
            if (isset($_SESSION['login'])) {
            $login = $_SESSION['login']; // Utilisez le nom d'utilisateur de la session.

            // Vérifiez les informations d'authentification de l'utilisateur.
            $modeleConnexions = new ModeleConnexions();
            list($authentificationValide, $idUtilisateur) = $modeleConnexions->verifierUtilisateur($login, $newPassword);
    
            if ($authentificationValide) {
                // Les informations d'authentification sont correctes, vous pouvez modifier les paramètres.
                $this->modele->modifierParametre($login, $newPassword, $newEmail);
            } else {
                // Les informations d'authentification sont incorrectes, affichez un message d'erreur.
                echo 'Authentification invalide, impossible de modifier les paramètres.';
            }
        }
    }
     

    public function exec() {
        switch ($this->action) {
            case 'modifier':
                $this->vue->form_modification();
                    if ($_SERVER["REQUEST_METHOD"] === "POST") {
                        $this->modifier();
                    }
                break;   
        }
        $this->vue->menu();
    }


}

?>
