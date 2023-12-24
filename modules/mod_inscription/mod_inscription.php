<?php
require_once 'cont_inscription.php';
        
class ModInscription{

    private $controleur;

    function __construct(){
        $this->controleur = new ContInscriptions();

    }
    public function exec() {
        // Appel de la méthode exec() du contrôleur
        $this->controleur->exec();
    }
}


?>
