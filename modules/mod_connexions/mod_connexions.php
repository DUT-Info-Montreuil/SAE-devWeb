<?php
require_once 'cont_connexions.php';
        
class ModConnexions {

    private $controleur;

    function __construct() {
        $this->controleur = new ContConnexions();
        $this->controleur->exec();
    }
}
?>
