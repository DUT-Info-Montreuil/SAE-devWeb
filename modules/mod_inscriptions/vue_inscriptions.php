<?php

class VueInscriptions { 

    public function form_inscription() {
        echo '<div class="inscription-container">';
        echo '<h2>VOTRE LÉGENDE COMMENCE ICI !</h2>'; // Ajout du titre
        echo '<form class="inscription-form" action="inscription" method="POST">';
        echo '<label for="login">Nom d\'utilisateur :</label>';
        echo '<input type="text" name="login" required><br><br>';
        echo '<label for="password">Mot de passe :</label>';
        echo '<input type="password" name="password" required><br><br>';
        echo '<input type="submit" value="S\'inscrire">';
        echo '</form>';
        echo '</div>';
    }
}


?>
