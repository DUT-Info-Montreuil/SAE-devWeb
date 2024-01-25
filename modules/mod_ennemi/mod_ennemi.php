<?php
require_once 'cont_ennemi.php';

class ModEnnemi{

    private $controleur;

    function __construct(){
        $this->controleur = new ContEnnemi();

    }
    public function exec() {
        // Appel de la méthode exec() du contrôleur
        $this->controleur->exec();
    }
}


?>
