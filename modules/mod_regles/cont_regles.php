<?php
include('modele_regles.php');
include('vue_regles.php');

class ContRegles {

    private $vue;
    private $action;

    public function __construct() {
        $this->vue = new VueRegles();    
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'regles';  
    }

    public function exec() {
        switch ($this->action) {
            case 'regles':
                $this->vue->afficherLesRegles();
            break;
            case 'step2':
                $this->vue->afficherLesRegles();
                $this->vue->afficherStep2();
            break;
        }
    }

}

?>
