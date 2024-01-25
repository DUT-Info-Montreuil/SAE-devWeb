<?php
include('modele_inscription.php');
include('vue_inscription.php');

class ContInscriptions {
    
    private $modele;
    private $vue;
    private $action;

    public function __construct() {
        $this->modele = new ModeleInscriptions();
        $this->vue = new VueInscriptions();    
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'inscription';  
    }

    public function traiterSoumissionFormulaire() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                echo 'Erreur CSRF : Qui es-tu ?';
                exit;
            }
            $login = $_POST["login"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password_confirm = $_POST["password_confirm"];
    
            // Vérifiez d'abord si les mots de passe correspondent
            if ($password === $password_confirm) {
                $this->modele->ajoutInscription($login, $password, $email);
                header('Location: index.php?module=debut');
                exit(); 
            }
        }
    }

    public function exec() {
        switch ($this->action) {
            case 'inscription':
                $this->vue->form_inscription();
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    $this->traiterSoumissionFormulaire();
                }
                break;
        }
    }

}

?>
