<?php

class VueMenu {

    private $affichage;

    public function __construct() {
        
        $this->affichage = '<a href="?module=debut"><img src="images/logo.png" alt="logo" width = 100></a>'; 
        $this->affichage .= '<nav>';
        $this->affichage .= '<ul>';

        $this->affichage .= '<li><button class="btn"><a href="index.php?module=tours&action=tours">Tours</a></button></li>';
        $this->affichage .= '<li><button class="btn"><a href="index.php?module=ennemi&action=ennemi">Ennemis</a></button></li>';
        $this->affichage .= '<li><button class="btn"><a href="index.php?module=boutique&action=boutique">Boutique</a></button></li>';
        $this->affichage .= '<li><button class="btn"><a href="index.php?module=regles&action=regles">Règles</a></button></li>';

        if (isset($_SESSION['login'])) {
            // Utilisateur connecté - Afficher le sous-menu
            $this->affichage .= '<li id="userMenu">';
            if (!empty($_SESSION['profil_image'])) {
                $this->affichage .= '<img src="' . $_SESSION['profil_image'] . '"'. $_SESSION['profil_image'] .'">';
            } else {
                $this->affichage .= '<button class="btn"><a href="#">' . $_SESSION['login'] . '</a></button>';  
            }
            $this->affichage .= '<ul class="sub-menu">';
            $this->affichage .= '<li><button class="btn"><a href="index.php?module=profil&action=profil">Profil</a></button></li>';
            $this->affichage .= '<li><button class="btn"><a href="index.php?module=parametre&action=modifier">Paramètres</a></button></li>';
            $this->affichage .= '<li><button class="btn"><a href="index.php?module=connexion&action=deconnexion">Déconnexion</a></button></li>';
            $this->affichage .= '</ul>';
            $this->affichage .= '</li>';
        } else  {
            // Utilisateur non connecté - Afficher le bouton stylisé pour la connexion
            $this->affichage .= '<li>';
            $this->affichage .= '<button class="btn"><a href="index.php?module=connexion">Connexion</a></button>';
            $this->affichage .= '</li>';
        }

        $this->affichage .= '</ul>';
        $this->affichage .= '</nav>';
        echo' <script src="js/script_sous_menu.js"></script>';
    }

    public function getAffichage() {
        return $this->affichage;
    }
}




?>
