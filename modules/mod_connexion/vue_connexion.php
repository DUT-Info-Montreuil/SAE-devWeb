<?php
require_once 'vue_generique.php';

class VueConnexions extends VueGenerique { 

    public function form_connexion($login = null) {
        echo '<link rel="stylesheet" type="text/css" href="css/style_connexion.css">';
        echo '<div class="animated-background"></div>';

        // Bloc de message de bienvenue
        echo '<div class="welcome-message">';
        echo '<p>"Chaque grand voyage commence par un petit pas."</p>';
        echo '</div>';
        echo '<h3>Bienvenue de retour, aventurier !</h3>';
        if ($login) {
            ?>
            <script>alert('<?php echo addslashes("Vous êtes déjà connecté."); ?>');</script> 
<?php
        } else {
            
            echo '<div class="form-container">';
            echo '<form class="container" action="index.php?module=connexion&action=connexion" method="POST">';
            echo '<input type="hidden" name="csrf_token" value="' . $_SESSION['csrf_token'] . '">';
            echo '<div class="input-container">';
            echo '<div class="input-content">';
            echo '<div class="input-dist">';
            echo '<div class="input-type">';
            echo '<input class="input-is" type="email" name="email" required placeholder="E-mail" />';
            echo '<input class="input-is" type="password" name="password" required placeholder="Mot de Passe" />';
    
            echo '<button class="submit" type="submit">Connexion</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</form>';
            
            echo '<p>Pour créer un compte, <a href="index.php?module=inscription&action=inscription">cliquer ici</a></p>';
            echo '</div>';
            echo'<script src="js/script_champ_manquant.js"></script>';
        }
    }
}
?>
