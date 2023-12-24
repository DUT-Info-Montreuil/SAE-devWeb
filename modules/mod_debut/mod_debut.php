<?php
require_once 'cont_debut.php';
        
class ModDebut {

    private $controleur;

    function __construct() {
        $this->controleur = new ContDebut();
    }

    public function exec() {
        // Appel de la méthode exec() du contrôleur
        $this->controleur->exec();
    }
}

?>
