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
    
            // Vérification du mot de passe et traitement de l'image de profil
            if ($newPassword === $password_confirm && $this->modele->verifierMotDePasse($login, $ancienPassword)) {
                if (isset($_FILES['profil_image']) && $_FILES['profil_image']['error'] === UPLOAD_ERR_OK) {
                    $logo = $_FILES['profil_image']['name'];
                    $cheminDestination = 'modules/mod_parametre/logos/' . $logo;
                    
                    if (move_uploaded_file($_FILES['profil_image']['tmp_name'], $cheminDestination)) {
                        $this->modele->modifierParametre($login, $newPassword, $newEmail, $cheminDestination);
                        echo 'Paramètres mis à jour avec succès.';
                    } else {
                        echo 'Erreur lors du téléchargement de l\'image de profil.';
                    }
                } else {
                    echo 'Veuillez sélectionner une image de profil valide.';
                }
            } else {
                echo 'Mot de passe incorrect ou les mots de passe ne correspondent pas.';
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
