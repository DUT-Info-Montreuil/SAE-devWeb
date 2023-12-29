<?php
require_once 'vue_generique.php';

class VueParametre extends VueGenerique {

    public function form_modification() {
        echo '<link rel="stylesheet" type="text/css" href="css/style_connexion.css">';
        echo '<div class="animated-background">';

        echo '<h2>Modifier vos paramètres ici :</h2>';

        echo '<form action="index.php?module=parametre&action=parametre" method="POST" enctype="multipart/form-data" onsubmit="return verifierMotsDePasse();">';
        echo '<div class="input-container">';
        echo '<div class="input-content">';
        echo '<div class="input-dist">';
        echo '<div class="input-type">';
        echo '<input type="hidden" name="id" value="'.$_SESSION['id'].'" required>';
        echo '<input class="input-is" type="text" name="login" placeholder="Nom d\'utilisateur" value="'.$_SESSION['nom'].'" required>';
        echo '<input class="input-is" type="email" name="email" placeholder="Adresse e-mail" value="'.$_SESSION['email'].'" required>';
        echo '<input class="input-is" type="password" name="password" placeholder="Mot de passe" required>';
        echo '<input class="input-is" type="password" name="password_confirm" required placeholder="Confirmer le mot de passe" />';
        echo '<button class="submit" type="submit">Modifier</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</form>';
        
            
        echo '</div>';
        echo'<script src="js/script_champ_manquant.js"></script>';
        echo'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo'<script src="js/script_erreur_mp.js"></script>';
    
        
    }

    public function boutton_parametre() {
        echo '<link rel="stylesheet" type="text/css" href="css/style_parametre_bouton.css">';
        echo '<div class="btn-container">';
        echo '<a href="index.php?module=parametre&action=parametre" class="boutton">';
        echo '<strong>PARAMETRES</strong>';
        echo '<div id="container-stars">';
        echo '<div id="stars"></div>';
        echo '</div>';
        echo '<div id="glow">';
        echo '<div class="circle"></div>';
        echo '<div class="circle"></div>';
        echo '</div>';
        echo '</a>';
        echo '</div>';     
    }
    
}
?>
