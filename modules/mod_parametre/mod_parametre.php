<?php
require_once 'controleur_parametre.php';
        
class ModParametre{

    private $controleur;

    function __construct(){
        $this->controleur = new ControleurParametre();

    }
    
    public function exec() {
        // Appel de la méthode exec() du contrôleur
        $this->controleur->exec();
    }
}

?>
