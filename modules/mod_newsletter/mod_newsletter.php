<?php
require_once 'cont_newsletter.php';

class ModNewsletter {

    private $controleur;

    function __construct() {
        $this->controleur = new ContNewsletter();
    }

    public function exec() {
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'souscrire':
                    $this->controleur->souscrire();
                    break;
                default:
                    $this->controleur->afficherForm();
                    break;
            }
        } else {
            $this->controleur->afficherForm();
        }
    }

}

?>
