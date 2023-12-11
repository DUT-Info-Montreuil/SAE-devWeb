<?php

class VueInscriptions { 

    public function form_inscription() {
        echo ' <h2>Page d\'inscription</h2>';
        echo '<form ?action=inscription" method="POST">'; 
        echo '<label for="login">Nom d\'utilisateur : </label>';
        echo '<input type="text" name="login" required><br><br>';
        echo '<label for="password">Mot de passe : </label>';
        echo '<input type="password" name="password" required><br><br>';
        echo '<input type="submit" value="S\'inscrire">';
        echo '</form>';
        echo '<p><a href="index.php?module=debut">Retour à la page d\'accueil</a></p>';
    }
    

}

?>
