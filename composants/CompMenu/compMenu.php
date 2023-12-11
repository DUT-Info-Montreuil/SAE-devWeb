<?php

require_once 'vue_menu.php';

class CompMenu {

    private $vue;

    public function __construct() {
        $this->vue = new VueMenu();
    }

    public function affiche() {
        echo $this->vue->getAffichage();
    }
}

?>
