<?php
require_once 'cont_connexion.php';
        
class ModConnexion {

    private $controleur;

    function __construct() {
        $this->controleur = new ContConnexions();
    }

    public function exec() {
        // Appel de la méthode exec() du contrôleur
        $this->controleur->exec();
    }
}

?>
