<?php
require_once 'cont_ami.php';
        
class ModAmi{

    private $controleur;

    function __construct(){
        $this->controleur = new ContAmi();

    }
    public function exec() {
        // Appel de la méthode exec() du contrôleur
        $this->controleur->exec();
    }
}


?>