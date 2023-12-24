<?php
include('modele_debut.php');
include('vue_debut.php');

class ContDebut {

    private $modele;
    private $vue;
    private $action;

    public function __construct() {
        $this->modele = new ModeleDebut();
        $this->vue = new VueDebut();    
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'pagePrincipale';  
    }

    public function seConnecter() {
    
    }

    
    public function seDeconnecter() {
      
    }
    

    public function exec() {
        switch ($this->action) {
            case 'pagePrincipale':
                $this->vue->afficherAccueil();
                break;
        }
    }
}
?>
