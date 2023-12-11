<?php

class VueMenu {

    private $affichage;

    public function __construct() {
        $this->affichage = '<ul>';
      //  $this->affichage .= '<li><a href="index.php?module=joueur">Menu des joueurs</a></li>';
       // $this->affichage .= '<li><a href="index.php?module=equipe">Menu des équipes</a></li>';
        $this->affichage .= '<li><a href="index.php?module=inscription">S\'inscrire ici</a></li>';
        $this->affichage .= '<li><a href="index.php?module=connexion">Se connecter ici</a></li>';
        $this->affichage .= '</ul>';
    }

    public function getAffichage() {
        return $this->affichage;
    }
}

?>
