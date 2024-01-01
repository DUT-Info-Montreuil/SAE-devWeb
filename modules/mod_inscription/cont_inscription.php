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
            $login = $_POST["login"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password_confirm = $_POST["password_confirm"];
    
            // Vérifiez d'abord si les mots de passe correspondent
            if ($password === $password_confirm) {
                // Vérifiez si l'email n'est pas déjà présent dans la base de données
                $emailExiste = $this->modele->verifierEmailExistant($email);
    
                if (!$emailExiste) {
                    // L'email n'existe pas, ajoutez l'inscription
                    $this->modele->ajoutInscription($login, $password, $email);
                    header('Location: index.php?module=debut');
                    exit();
                }
                else {
                    echo "<script>alert('L'email existe déjà.');</script>";   
                }
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
