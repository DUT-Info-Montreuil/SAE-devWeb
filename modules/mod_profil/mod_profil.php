<?php
require_once 'cont_profil.php';
        
class ModProfil{

    private $controleur;

    function __construct(){
        $this->controleur = new ContProfil();

    }
    public function exec() {
        // Appel de la méthode exec() du contrôleur
        $this->controleur->exec();
    }
}


?>
