<?php
include('modele_regles.php');
include('vue_regles.php');

class Contregles {
    
    private $modele;
    private $vue;
    private $action;

    public function __construct() {
        $this->modele = new ModeleRegles();
        $this->vue = new VueRegles();    
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'regles';  
    }

    public function exec() {
        switch ($this->action) {
            case 'regles':
                $regles = $this->modele->recupererRegles();
                $this->vue->afficherregles($regles);
            break;    
        }
    }

}

?>
