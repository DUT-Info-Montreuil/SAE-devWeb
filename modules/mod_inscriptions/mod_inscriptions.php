<?php
require_once 'cont_inscriptions.php';
        
class ModInscriptions{

    private $controleur;

    function __construct(){
        $this->controleur = new ContInscriptions();
        $this->controleur->exec();

    }
}


?>
