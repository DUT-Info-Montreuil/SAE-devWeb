<?php
require_once 'cont_boutique.php';
        
class ModBoutique{

    private $controleur;

    function __construct(){
        $this->controleur = new ContBoutique();

    }
    public function exec() {
        // Appel de la méthode exec() du contrôleur
        $this->controleur->exec();
    }
}


?>
