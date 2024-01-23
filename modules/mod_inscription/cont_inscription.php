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

            $errorMessage = '';

            // Vérification de la longueur du mot de passe
            if (strlen($password) < 10) {
                $errorMessage = 'Le mot de passe doit comporter au moins 10 caractères.';
            }
            // Vérification de la complexité du mot de passe
            elseif (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).*$/', $password)) {
                $errorMessage = 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.';
            }
            // Vérification de la correspondance des mots de passe
            elseif ($password !== $password_confirm) {
                $errorMessage = 'Les mots de passe ne correspondent pas.';
            }

            if ($errorMessage) {
                $this->vue->form_inscription($errorMessage);
            } else {
                $this->modele->ajoutInscription($login, $password, $email);
                header('Location: index.php?module=debut');
                exit();
            }
        }
    }

    public function exec() {
        if ($this->action === 'inscription') {
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $this->traiterSoumissionFormulaire();
            } else {
                $this->vue->form_inscription();
            }
        }
    } 
}
?>
