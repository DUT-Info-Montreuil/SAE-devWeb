<?php
include('modele_newsletter.php');
include('vue_newsletter.php');

class ContNewsletter {
    private $modele;
    private $vue;

    public function __construct() {
        $this->modele = new ModeleNewsletter();
        $this->vue = new VueNewsletter();
    }

 
}
?>
