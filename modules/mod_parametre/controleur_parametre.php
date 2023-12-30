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
                $this->action = isset($_GET['action']) ? $_GET['action'] : 'modifier';  
    
    }

    public function modifier() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['ancienPassword']) && isset($_POST['newPassword']) && isset($_POST['password_confirm']) && isset($_POST['login']) && isset($_POST['email'])) {
            $ancienPassword = $_POST['ancienPassword'];
            $newPassword = $_POST['newPassword'];
            $password_confirm = $_POST["password_confirm"];
            $newEmail = $_POST['email'];
            $login = $_SESSION['login'];
    
            // Authentification de l'utilisateur en vérifiant l'ancien mot de passe
            if ($newPassword === $password_confirm && $this->modele->verifierMotDePasse($login, $ancienPassword)) {
                // L'authentification est réussie, vous pouvez mettre à jour la base de données
                $this->modele->modifierParametre($login, $newPassword, $newEmail);
                echo 'Paramètres mis à jour avec succès.';

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
    }
}

?>
