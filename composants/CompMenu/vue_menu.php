<?php

class VueMenu {

    private $affichage;

    public function __construct() {
        $this->affichage = '<nav>';
        $this->affichage .= '<ul>';

        $this->affichage .= '<li><a href="#tours">Tours</a></li>';
        $this->affichage .= '<li><a href="#ennemis">Ennemis</a></li>';
        $this->affichage .= '<li><a href="#boutique">Boutique</a></li>';
        $this->affichage .= '<li><a href="#regles">Règles</a></li>';

        if (isset($_SESSION['login'])) {
            // Utilisateur connecté - Afficher le sous-menu
            $this->affichage .= '<li>';
            $this->affichage .= '<a href="#">' . $_SESSION['login'] . '</a>';
            $this->affichage .= '<ul class="sub-menu">';
            $this->affichage .= '<li><a href="index.php?module=profil&action=afficherProfil">Profil</a></li>';
            $this->affichage .= '<li><a href="#">Paramètres</a></li>';
            $this->affichage .= '<li><a href="index.php?module=connexion&action=deconnexion">Déconnexion</a></li>';
            $this->affichage .= '</ul>';
            $this->affichage .= '</li>';
        } else {
            // Utilisateur non connecté - Afficher le lien de connexion
            $this->affichage .= '<li><a href="index.php?module=connexion">Connexion</a></li>';
        }

        $this->affichage .= '</ul>';
        $this->affichage .= '</nav>';
    }

    public function getAffichage() {
        return $this->affichage;
    }
}


?>
