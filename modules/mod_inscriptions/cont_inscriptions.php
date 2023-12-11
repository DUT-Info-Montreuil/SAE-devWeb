<?php
include('modele_inscriptions.php');
include('vue_inscriptions.php');

class ContInscriptions {
    
    private $modele;
    private $vue;
    private $action;

    public function __construct() {
        $this->modele = new ModeleInscriptions();
        $this->vue = new VueInscriptions();    
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'inscription';  
    }


    public function ajout() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            
            $this->modele->ajoutInscription($login, $password);
        } else {
            echo "Erreur lors de l'insertion !";
        }
    }
    

    public function exec() {
        switch ($this->action) {
            case 'inscription':
                $this->vue->form_inscription();
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    $this->ajout();
                }
                break;
        }
    }

}

?>
