<?php

require_once 'vue_generique.php';


class VueConnexions extends VueGenerique{ 

    public function form_connexion($login = null) {
        if ($login) {
            // Code pour gérer le cas où l'utilisateur est déjà connecté
        } else {
            echo '<form class="connexion-form" action="index.php?module=connexion&action=connexion" method="POST">'; 
            echo '<label for="login">Nom d\'utilisateur : </label>';
            echo '<input type="text" name="login" required><br><br>';
            echo '<label for="password">Mot de passe : </label>';
            echo '<input type="password" name="password" required><br><br>';
            echo '<input type="submit" value="Se connecter">';
            echo '</form>';
        }
    
        echo '<p>Pour créer un compte.<a href="index.php?module=inscription&action=inscription"> Cliquer ici</a></p>';
       // echo '<p><a href="index.php">Retour à la page d\'accueil</a></p>';
    }
    
}

?>
