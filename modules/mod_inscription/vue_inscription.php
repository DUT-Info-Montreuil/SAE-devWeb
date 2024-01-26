<?php
require_once 'vue_generique.php';

class VueInscriptions extends VueGenerique { 

    public function form_inscription() {
        echo '<link rel="stylesheet" type="text/css" href="css/style_connexion.css">';
        echo '<div class="animated-background"></div>';
    
        // Bloc de message de bienvenue
        echo '<div class="welcome-message">';
        echo '<p>"Chaque grand voyage commence par un petit pas."</p>';
        echo '</div>';

        echo '<h3>Votre légende commence ici !</h3>';
        echo '<div class="form-container">';
        echo '<form class="container" action="index.php?module=inscription&action=inscription" method="POST" onsubmit="return verifierMotsDePasse();">';
        echo '<input type="hidden" name="csrf_token" value="' . $_SESSION['csrf_token'] . '">';
        echo '<div class="input-container">';
        echo '<div class="input-content">';
        echo '<div class="input-dist">';
        echo '<div class="input-type">';
        echo '<input class="input-is" type="text" name="login" required placeholder="Nom d\'utilisateur" />';
        echo '<input class="input-is" type="email" name="email" required placeholder="Adresse e-mail" />';
        echo '<input class="input-is" type="password" name="password" required placeholder="Mot de Passe" />';
        echo '<input class="input-is" type="password" name="password_confirm" required placeholder="Confirmer le mot de passe" />';
        echo '<button class="submit" type="submit">S\'inscrire</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</form>';
        
        echo '<p>Pour vous connecter, <a href="index.php?module=connexion">cliquer ici</a></p>';
        
        echo '</div>';
        echo'<script src="js/script_champ_manquant.js"></script>';
        echo'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo'<script src="js/script_erreur_mp.js"></script>';

        echo' <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
        echo'<script src="js/script_mail.js"></script>';

    }
    
}
?>

