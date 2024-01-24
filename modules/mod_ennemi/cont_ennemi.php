<?php
include('modele_ennemi.php');
include('vue_ennemi.php');

class Contennemi {

    private $modele;
    private $vue;
    private $action;

    public function __construct() {
        $this->modele = new ModeleEnnemi();
        $this->vue = new VueEnnemi();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'ennemi';
    }

    public function exec() {
        switch ($this->action) {
            case 'ennemi':
                $this->vue->afficherennemi();
            break;
        }
    }

}

?>
